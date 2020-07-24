@extends('admin.admin-layout')

@section('sheets')
    <link href="{{ URL::asset('css/background_css.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
        
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
          @if (session('status'))
              <div class="text-center alert alert-warning">
                  {{ session('status') }}
              </div>
          @endif

          @if (session('success'))
              <div class="text-center alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
        <div class="section-header">
          <h2>{{ $event->eventname}}</h2>
          <p>{{ $event->when }}, {{$event->where }}</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="storage/public/web_upload/eventphoto/{{ $event->eventphoto}}" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>Event Details</h2>
              <p>{{ $event->shortdescription }}.</p>
              <p>{{ $event->description }}.</p>
 
              <br>
              @if(!empty ( $event->eventfile))
                  <a class="pull-right btn btn-success" href="storage/public/web_upload/eventfiles/{{$event->eventfile}}" download="{{$event->eventfile}}"><b>Download the Event Book</b></a>
              @endif
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      <div class="row event-links">
        <div class="col-lg-12">
          @if($event->status == '1')
            <h3 style="color: red" class="text-center">SORRY, Event Registration is Over.</h3>
          @else
            <div class="row">
              <div class="col-lg-6">
                @if($event->registration == '1')
                  <h5>Registration is Required to attend the event. Follow link below.</h5>
                     <a class="pull-right btn btn-primary" href="{{ route('Event-Registation.create') }}">Register to Event</a>
                @endif
              </div>
              
              <div class="col-lg-6">
                @if($event->participation == '1')
                  <h5>Register your Team and submit your Idea to get started. </h5>
                    <a class="pull-left btn btn-primary" href="{{ route('Idea-Submission.create') }}">Participate & Submit Idea</a>
                @endif
              </div>
              
            </div>
          @endif
        </div>
      </div>
        
      </div>

    </section>
@endsection



