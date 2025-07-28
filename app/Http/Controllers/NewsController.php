<?php

// app/Http/Controllers/Dashboard/NewsController.php
namespace App\Http\Controllers;

use App\Models\News;

use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
       use SaveFile;

    // function __construct()
    // {
    //      $this->middleware('permission:new-list|new-create|new-edit|new-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:new-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:new-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:new-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $news=News::all();
        // dd($news);
        return view('dashboard.news.index',['news'=>$news]);
    }

    public function create()
    {
        return view('dashboard.news.create');
    }
    public function store(Request $request)
    {
        // Step 1: Validate the request
        $request->validate([
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ar.name' => 'required|string',
            'ar.description' => 'nullable|string',
            'ar.body' => 'nullable|string',
            'en.name' => 'required|string',
            'en.description' => 'nullable|string',
            'en.body' => 'nullable|string',

        ]);

        // Step 2: Save the main new fields
        $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translation fields

        if ($request->hasFile('image')) {
            $data['image'] = $this->SaveImage('images/news', $request->file('image'));
        }

        $new = News::create($data); // Save main fields like 'status'

        // Step 3: Handle translations for each locale
        $locales = array_keys(config('app.languages')); // ['ar', 'en', 'fr']
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $new->translateOrNew($locale)->name = $request->input("$locale.name");
                $new->translateOrNew($locale)->description = $request->input("$locale.description");
                $new->translateOrNew($locale)->body = $request->input("$locale.body");
            }
        }

        $new->save(); // Save translations and main new data

        return redirect()->route('news.index')->with('success', 'new created successfully.');
    }


    public function show(News $new)
    {
        //
    }

    public function edit(News $news)
{
    return view('dashboard.news.edit', ['news' => $news]);
}


    public function update(Request $request, $id)
{
    $new = News::find($id);
    if (!$new) {
        return redirect()->route('news.index')->withErrors(['error' => 'new record not found.']);
    }

    if ($request->hasFile('image') && $new->image && file_exists(public_path('images/news/'.$new->image))) {
        unlink(public_path('images/news/'.$new->image));
    }

    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/news', $request->file('image'));
        $new->image = $finalImagePathName;
    }

    // ✅ تحديث الحالة هنا
    $new->status = $request->input('status');

    // تحديث الترجمة
    $locales = array_keys(config('app.languages'));
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $new->translateOrNew($locale)->name = $request->input("$locale.name");
            $new->translateOrNew($locale)->description = $request->input("$locale.description");
            $new->translateOrNew($locale)->body = $request->input("$locale.body");
        }
    }

    // حفظ النموذج
    $new->save();

    return redirect()->route('news.index')->with('success', 'تم تحديث الخدمة بنجاح.');
}



    public function destroy(Request $request)
{
    $new = News::find($request->new_id);
    if (!$new) {
        return redirect()->route('news.index')->with('error', 'new not found.');
    }
    // Unlink the associated image if it exists
    if ($new->image && file_exists(public_path('images/news/' . $new->image))) {
        unlink(public_path('images/news/' . $new->image));
    }
    // Delete translations and the new record
    $new->translations()->delete();
    $new->delete();
    return redirect()->route('news.index')->with('success', 'new deleted successfully.');
}
}