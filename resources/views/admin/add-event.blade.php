@extends('admin.admin-layout')

@section('content')
        
        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form role="form" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Add New Event of E-Cell AIT</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="eventname" class="form-control" placeholder="Event Name *" value="" />
                            @if ($errors->has('eventname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('eventname') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="when" class="form-control" placeholder="When *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="where" class="form-control" placeholder="Where *" value="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="shortdescription" class="form-control" placeholder="About Event/ Short Description *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="Event Rules and Participation Description in Detail.*" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="registration" value="1" {{ old('registration') ? 'checked' : '' }}> {{ __('Accept Registration') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="participation" value="1" {{ old('Participation') ? 'checked' : '' }}> {{ __('Accept Participation') }}
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="videolink"> <b> Video Link </b></label>
                            <input type="text" name="eventvideo" class="form-control" placeholder="Home Page Video Link" value="" />
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> <b> Upload Event Photo </b></label>
                            <input type="file" name="eventphoto" id="exampleFormControlFile1">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> <b> Upload Event's Detail File </b></label>
                            <input type="file" name="eventfile" id="exampleFormControlFile1">
                          </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Submit" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection



