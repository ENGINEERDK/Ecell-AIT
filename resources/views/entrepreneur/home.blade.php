@extends('entrepreneur.entrepreneur-layout')

@section('content')
<div class="container">
   {{-- Events Cards --}}
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

            <a href="/events" class="col-xl-6 col-lg-8">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body tab-button">
                  <div class="row">
                    <div class="col">
                      <span class="pull-right"> Posted on : {{ date('F d, Y', strtotime($event->created_at)) }}</span>
                      <h5 class="card-title text-uppercase text-muted mb-0">Our Latest Event</h5>
                      <span class="h4 font-weight-bold mb-0">{{ $event->eventname}} </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="pull-left">Total Registrations : {{ count($registrants) }}</span>
                    <span class="pull-right">Total Submissions : {{ count($submissions) }}</span>
                  </p>
                </div>
              </div>
            </a>

            {{-- <a href="/events"  class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New Post</h5>
                      <span class="h4 font-weight-bold mb-0 add-event">Add New Posts</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap">Add latest post to site.</span>
                  </p>
                </div>
              </div>
            </a> --}}

          </div>
        </div>
      </div>
    </div>

  <br><br>
{{-- Latest event registrations --}}
<div class="table-responsive">
  <h3><b>Your Registrations </b></h3>
  <table id="dtBasicExample" class="table table-striped" style="background: white;">
    @if($registrants->isEmpty())
      <h4 class="text-center">No Registration yet.</h4>
    @else
    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Standard</th>
        <th>Branch</th>
        <th>Contact</th>
        <th>Registered At</th>
        <th>Status</th>
      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      @foreach ($registrants as $registrant)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{$registrant->name}}</td>
        <td>{{$registrant->standard}} </td>
        <td>{{$registrant->branch}}</td>
        <td>{{$registrant->contact}}</td>
        <td>{{ date('F d, Y', strtotime($registrant->created_at)) }}</td>
        <td><i style="color: green">Registered</i></td>
      </tr>
      @endforeach  
    </tbody>
    @endif
  </table>
  
  <!--Table-->
</div>

{{-- Latest event Submittions --}}
<div class="table-responsive">
  <br><br>
  
  <h3><b>Your Participations</b></h3>
  <table id="dtBasicExample" class="table table-striped" style="background: white;">
    @if($submissions->isEmpty())
      <h4 class="text-center">No Idea Submissions yet.</h4>
    @else
    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Standard</th>
        <th>Branch</th>
        <th>Contact</th>
        <th>Idea Title</th>
        <th>Submitted At</th>
        <th>Status</th>

      </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      @foreach ($submissions as $submission)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{$submission->name}}</td>
        <td>{{$submission->standard}} </td>
        <td>{{$submission->branch}}</td>
        <td>{{$submission->contact}}</td>
        <td>{{$submission->description}}</td>
        <td>{{ date('F d, Y', strtotime($submission->created_at)) }}</td>
        <td><i style="color: green">Submitted</i></td>
      </tr>
      @endforeach
    </tbody>
    <!--Table body-->
  @endif

  </table>
  {{-- <p class="pull-right"><i>{{ count($submissions) }} : Submissions</i></p> --}}
  <!--Table-->
</div>
<br>

</div>
@endsection
