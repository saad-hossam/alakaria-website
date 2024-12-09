<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::orderBy('created_at', 'DESC')->get();
        return view('dashboard.messages.index',['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.messages.create');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
           'message'=>'required'
        ]);
        // $message=new Message;
        // $message->name=$request->name;
        // $message->email=$request->email;
        // $message->message=$request->message;
        // $message->save();
        // return redirect()->route('messages.index');

        // using Eloquent ORM
        $message=new Message;
        $message->fill($request->all());
        $message->save();
        return redirect()->route('home');

        // using Query Builder
        // $message=Message::create($request->all());
        // return redirect()->route('messages.index');

        // using Mail
        // use Illuminate\Support\Facades\Mail;
        // use App\Mail\UserMessage;
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email',
        //    'message'=>'required'
        // ]);

        // $message=Message::create($request->all());
        // dd($message);
        // Mail::to('salimeslam55@gmail.com')->send(new UserMessage($request));
        // return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
