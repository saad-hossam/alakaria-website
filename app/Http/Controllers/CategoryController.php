<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('department')->get();
        return view('dashboard.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view('dashboard.categories.create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
        $category = Category::create($data);  // This will save 'status' and other fields
        // Step 2: Handle translations for each locale (ar, en, fr)
        $locales = array_keys(config('app.languages'));  // List of locales to process

        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                // Create or update the translation for each locale
                $category->translateOrNew($locale)->name = $request->input("$locale.name");
                // Add other translatable fields, like description, if needed
                // $category->translateOrNew($locale)->description = $request->input("$locale.description");
            }
        }

        // Save the c$category along with its translations
        $category->save();

        // Redirect to c$categorys index
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $departments=Department::all();
        return view('dashboard.categories.edit',['category'=>$category,'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'department_id' => 'required',
            'ar.name' => 'required|string|max:255',
            'en.name' => 'required|string|max:255',
        ]);
        $category->department_id=$validatedData['department_id'];
        $category->status=$validatedData['status'];
        $locales = array_keys(config('app.languages'));  // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $category->translateOrNew($locale)->name =$validatedData[$locale]['name'];
             }
        }
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category=Category::find($request->category_id);
        $category->translations()->delete();
        $category->delete();
        return redirect()->route('categories.index');

    }
}
