<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:gallary-list|gallary-create|gallary-edit|gallary-delete', ['only' => ['index','store']]);
         $this->middleware('permission:gallary-create', ['only' => ['create','store']]);
         $this->middleware('permission:gallary-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:gallary-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gallaries=Gallary::all();
        return view('dashboard.gallary.index',['gallaries'=>$gallaries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data=[];
        $finalImagePathName = $this->SaveImage('images/gallary', $request->file('image'));
        $data['image']=$finalImagePathName;
        $data['order']=$request->order;
        Gallary::create($data);
        return redirect()->route('gallaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallary $gallary)
    {
        return view('dashboard.gallary.edit',['gallary'=>$gallary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
        //
        // dd($request);
        $data=[];
        if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/gallary', $request->file('image'));
            $data['image']=$finalImagePathName;
            # code...
        }
        $data['order']=$request->order;
        $gallary->update($data);
        return redirect()->route('gallaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request)
    {
        // dd($request);
        $gallary=Gallary::find($request->gallary_id);
        $gallary->delete();
        return redirect()->route('gallaries.index');
    }
}
