<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin', ['except' => ['index']]);
    }
    
    
    public function index()
    {
        $this->middleware('auth:entrepreneur');
        $event = Event::orderBy('created_at', 'desc')->first();
        return view('admin/event',compact('event'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add-event');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'eventname' => 'required|unique:events|max:255',
            'when' => 'required|max:255',
            'where' => 'required|max:255',

            'shortdescription' => 'required|max:355',
            'description' => 'required',


            'eventvideo' => 'max:500',
            'eventphoto' => 'nullable|image',
            'eventfile' => 'nullable|file',

            // nullable == optional
            // apache max upload 2mb
        ]);

        // Handle Event Pic Upload
        if($request->hasFile('eventphoto')) {
            // Get filename with extension           
            $filenameWithExt = $request->file('eventphoto')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('eventphoto')->getClientOriginalExtension();
            //Filename to store
            $imageNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('eventphoto')->storeAs('public/web_upload/eventphoto', $imageNameToStore);
        } else {
            $imageNameToStore = 'noimage.jpg';
        }

        // Handle File Upload
        if($request->hasFile('eventfile')) {
            $filenameWithExt = $request->file('eventfile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('eventfile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload
            $path = $request->file('eventfile')->storeAs('public/web_upload/eventfiles', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        // Handle Video Name Upload
        if($request->input('eventvideo')) {
            $videoNameToStore = $request->input('eventvideo');                       
        } else {
            $videoNameToStore = 'https://www.youtube.com/watch?v=aozlwC3XwfY';
        }

        // create Event
        $event = new Event;
        $event->eventname = $request->input('eventname');
        $event->when = $request->input('when');
        $event->where = $request->input('where');

        $event->shortdescription = $request->input('shortdescription');
        $event->description = $request->input('description');

        $event->registration = $request->has('registration') ? 1 : 0;
        $event->participation = $request->has('participation') ? 1 : 0;

        $event->eventvideo = $videoNameToStore ;

        $event->eventphoto = $imageNameToStore;
        $event->eventfile = $fileNameToStore;

        $event->save();
        return redirect('/events')->with('success', 'Post created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
