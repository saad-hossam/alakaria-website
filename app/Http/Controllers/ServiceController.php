<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view('dashboard.services.index',['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Step 1: Save the service main fields (e.g., status)
          $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations
          $service = service::create($data);  // This will save 'status' and other fields
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process

          foreach ($locales as $locale) {
              if ($request->has($locale)) {
                  // Create or update the translation for each locale
                  $service->translateOrNew($locale)->name = $request->input("$locale.name");



                  // Add other translatable fields, like description, if needed
                  $service->translateOrNew($locale)->description = $request->input("$locale.description");

              }
          }

          // Save the service along with its translations
          $service->save();

          // Redirect to services index
          return redirect()->route('services.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit',['service' => $service]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'icon'=>'required|string',
            'ar.name' => 'required|string|max:255',
            'en.name' => 'required|string|max:255',
            'ar.description' => 'required|string',
            'en.description' => 'required|string',

        ]);
        $service->status=$validatedData['status'];
        $service->icon=$validatedData['icon'];

        $locales = array_keys(config('app.languages'));  // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $service->translateOrNew($locale)->name =$validatedData[$locale]['name'];
                $service->translateOrNew($locale)->description = $validatedData[$locale]['description'];

             }
        }
        $service->save();
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service=Service::find($request->service_id);
        $service->translations()->delete();
        $service->delete();
        return redirect()->route('services.index');
    }
}
