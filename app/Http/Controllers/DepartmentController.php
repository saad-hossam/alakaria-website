<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;

class DepartmentController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','store']]);
         $this->middleware('permission:department-create', ['only' => ['create','store']]);
         $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $departments=Department::all();
    //    dd($departments);
        return view('dashboard.departments.index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartment $request)
    {
        // Step 1: Save the department main fields (e.g., status)
        $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations
        $department = Department::create($data);  // This will save 'status' and other fields
        // Step 2: Handle translations for each locale (ar, en, fr)
        $locales = array_keys(config('app.languages'));  // List of locales to process

        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                // Create or update the translation for each locale
                $department->translateOrNew($locale)->name = $request->input("$locale.name");
                // Add other translatable fields, like description, if needed
                // $department->translateOrNew($locale)->description = $request->input("$locale.description");
            }
        }

        // Save the department along with its translations
        $department->save();

        // Redirect to departments index
        return redirect()->route('departments.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // dd(1);
        return view('dashboard.departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartment $request, Department $department)
    {
          // dd($request);
        $validatedData = $request->validate([
            'status' => 'required|string',
            'ar.name' => 'required|string|max:255',
            'en.name' => 'required|string|max:255',
        ]);
        $department->status=$validatedData['status'];
        $locales = array_keys(config('app.languages'));  // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $department->translateOrNew($locale)->name =$validatedData[$locale]['name'];
             }
        }
        $department->save();
        return redirect()->route('departments.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $department=Department::find($request->department_id);
        $department->translations()->delete();
        $department->delete();
        return redirect()->route('departments.index');

    }
}
