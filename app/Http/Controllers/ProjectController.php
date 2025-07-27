<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Project;
use App\Traits\SaveFile;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    use SaveFile;
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','store']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('dashboard.projects.create', compact('departments'));
    }

    public function store(StoreProjectRequest $request)
    {
        // Save Main Image
        $mainImagePath = null;
        if ($request->hasFile('image')) {
            $mainImagePath = $this->saveImage('images/projects/main', $request->file('image'));
        }

        // Create Project
        $project = Project::create([
            'department_id' => $request->department_id,
            'status' => $request->status,
            'image' => $mainImagePath,
        ]);

        // Save Translations
        foreach (config('app.languages') as $key => $lang) {
            $name = strip_tags($request->input("{$key}.name")); // Remove HTML tags
            $description = strip_tags($request->input("{$key}.description")); // Remove HTML tags

            $project->translations()->create([
                'locale' => $key,
                'name' => $name,
                'description' => $description,
            ]);
        }

        // Save Additional Images
        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->saveImage('images/projects/gallary', $image);
                $additionalImages[] = $imagePath; // Store paths in an array
            }
        }

        // Update the project with additional images as a JSON array
        $project->update([
            'images' => $additionalImages, // Save as JSON
        ]);

        // Redirect to Projects Index with Success Message
        return redirect()->route('projects.index')->with('success', 'تم إضافة المشروع بنجاح!');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        $departments = Department::all();
        // No need to decode images here because it's handled automatically by the model
        // Check if 'images' is a JSON string or an array
        $additionalImages = is_array($project->images) ? $project->images : json_decode($project->images, true);
        // dd($project);

        return view('dashboard.projects.edit', compact('project',
         'departments',
        'additionalImages'));
    }

  public function update(Request $request, Project $project)
{
    $data = $request->validate([
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);



    // 1. تحديث الصورة الرئيسية إن تم رفع واحدة جديدة
    if ($request->hasFile('main_image')) {
        $oldMainPath = public_path('images/projects/' . $project->main_image);
        if (file_exists($oldMainPath)) {
            unlink($oldMainPath);
        }

        $data['main_image'] = $this->saveImage('images/projects', $request->file('main_image'));
    } else {
        // الاحتفاظ بالصورة الرئيسية القديمة
        $data['main_image'] = $project->main_image;
    }

    // 2. التعامل مع الصور الإضافية (images[])
    if ($request->hasFile('images')) {
        // حذف الصور القديمة
        foreach ((array) $project->images as $oldImage) {
            $oldImagePath = public_path('images/projects/gallary/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // حفظ الصور الجديدة
        $newImages = [];
        foreach ($request->file('images') as $image) {
            $newImages[] = $this->saveImage('images/projects/gallary', $image);
        }

        $data['images'] = $newImages;
    } else {
        // الاحتفاظ بالصور القديمة
        $data['images'] = $project->images;
    }

    // 3. تحديث المشروع
    $project->update($data);

    return redirect()->route('projects.index')->with('success', 'تم التحديث بنجاح');
}



public function showImages($projectId)
{
    // Fetch the project by ID or fail if not found
    $project = Project::findOrFail($projectId);

    // Retrieve images (handled as an array due to model casts)
    $additionalImages = $project->images ?? []; // Default to empty array if no images

    // Pass the project and images to the view
    return view('dashboard.projects.show_images', compact('project', 'additionalImages'));
}

    public function destroy(Request $request)
    {
        // Find the project by ID
        $project = Project::find($request->project_id);

        // Check if the project exists
        if (!$project) {
            return redirect()->route('projects.index')->withErrors(['error' => 'Project not found.']);
        }
        // Delete the main image (image) if it exists
        if ($project->image) {
            $mainImagePath = public_path('images/projects/main/' . $project->image);
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }
        // Delete additional images if they exist
        if (is_array($project->images)) {
            foreach ($project->images as $image) {
                $imagePath = public_path('images/projects/gallary/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }


}
