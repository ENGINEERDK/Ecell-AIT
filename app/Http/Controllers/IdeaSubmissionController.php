<?php

namespace App\Http\Controllers;

use App\Event;
use App\IdeaSubmission;
use Illuminate\Http\Request;

class IdeaSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:entrepreneur');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::orderBy('created_at', 'desc')->first();
        if($event->status == '1')
            return back()->with('status', 'Event Registration is Over.');
        else{
            
            return view('entrepreneur/idea_submission',compact('event'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::orderBy('created_at', 'desc')->first();

        $submissions = IdeaSubmission::where([ ['event_id', $event->id ],['user_id', $request->input('user_id')]])->get();

        if(count($submissions)>'0')
            return redirect('/events')->with('status', 'Your Idea is Already Submitted to AIT C-Cell.');

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'contact' => 'required',
            'collegename' => 'required',
            'standard' => 'required',
            'branch' => 'required',

            'title' => 'required',
            'description' => 'required',
            
            'category' => 'required',
            'domain' => 'required',
            'projectstatus' => 'required',
        ]);   

        // Handle File Upload
        if($request->hasFile('ideafile')) {
            $filenameWithExt = $request->file('ideafile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ideafile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload
            $path = $request->file('eventfile')->storeAs('public/web_upload/event_submission', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }


        $submission = new IdeaSubmission;
        $submission->event_id = $event->id;
        $submission->user_id = $request->input('user_id');
        $submission->name = $request->input('name');
        $submission->email = $request->input('email');
        $submission->standard = $request->input('standard');
        $submission->branch = $request->input('branch');
        $submission->contact = $request->input('contact');
        $submission->collegename = $request->input('collegename');

        $submission->name2 = $request->input('name2');
        $submission->email2 = $request->input('email2');

        $submission->name3 = $request->input('name3');
        $submission->email3 = $request->input('email3');

        $submission->name4 = $request->input('name4');
        $submission->email4 = $request->input('email4');

        $submission->title = $request->input('title');
        $submission->description = $request->input('description');

        $submission->category = $request->input('category');
        $submission->domain = $request->input('domain');
        $submission->projectstatus = $request->input('name2');

        $submission->ideafile = $fileNameToStore;

        $submission->save();
        return redirect('/events')->with('success', 'Idea has been submitted Successfully.'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IdeaSubmission  $ideaSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaSubmission $ideaSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IdeaSubmission  $ideaSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaSubmission $ideaSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IdeaSubmission  $ideaSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IdeaSubmission $ideaSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IdeaSubmission  $ideaSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaSubmission $ideaSubmission)
    {
        //
    }
}
