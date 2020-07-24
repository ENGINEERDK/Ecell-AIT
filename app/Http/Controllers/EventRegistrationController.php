<?php

namespace App\Http\Controllers;
use App\Event;
use App\EventRegistration;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
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
            
            return view('entrepreneur/event_registration',compact('event'));
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

        $registers = EventRegistration::where([ ['event_id', $event->id ],['user_id', $request->input('user_id')]])->get();

        if(count($registers)>'0')
            return redirect('/events')->with('status', 'You are already registered for this Event.');

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',

            'collegename' => 'required|max:355',

            'standard' => 'required',
            'branch' => 'required',

            'comment' => 'required|max:500',
        ]);   

        

        $registration = new EventRegistration;
        $registration->event_id = $event->id;
        $registration->user_id = $request->input('user_id');
        $registration->name = $request->input('name');
        $registration->email = $request->input('email');
        $registration->standard = $request->input('standard');
        $registration->branch = $request->input('branch');
        $registration->contact = $request->input('contact');
        $registration->collegename = $request->input('collegename');
        $registration->comment = $request->input('comment');

        $registration->save();
        return redirect('/events')->with('success', 'You are Registered for this Event.'); 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventRegistration  $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(EventRegistration $eventRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventRegistration  $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(EventRegistration $eventRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventRegistration  $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventRegistration $eventRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventRegistration  $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventRegistration $eventRegistration)
    {
        //
    }
}
