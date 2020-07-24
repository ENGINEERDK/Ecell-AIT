@extends('entrepreneur.entrepreneur-layout')

@section('content')
        
<div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form role="form" action="{{ route('Event-Registation.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3>{{ $event->eventname}}</h3>
        <p class="text-center"><i>Event Registration</i></p>
        
       <div class="row">
            <input type="hidden" name="user_id" value="{{ Auth::guard('entrepreneur')->user()->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" value="{{ Auth::guard('entrepreneur')->user()->name }}" readonly="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="E Mail *" value="{{ Auth::guard('entrepreneur')->user()->email }}" readonly />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" required name="contact" class="form-control" placeholder="Your Contact No *"  />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control" name="standard">
                      <option value="FE">FE</option>
                      <option value="SE">SE</option>
                      <option value="TE">TE</option>
                      <option value="BE">BE</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <select class="form-control" name="branch">
                      <option value="E&TC">E&TC</option>
                      <option value="MECH">MECH</option>
                      <option value="COMP">COMP</option>
                      <option value="IT">IT</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="collegename" class="form-control" placeholder="Your College *"  />
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="comment" class="form-control" placeholder="Your motivation/ Any Comment.*" style="width: 100%; height: 100px;"></textarea>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class=" col-md-12 col-lg-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required name="registration" value="1" {{ old('registration') ? 'checked' : '' }}> {{ __('Read about Event.') }}
                    </label>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Register for Event" />
                </div>
            </div>
        </div>
    </form>
</div>
@endsection



