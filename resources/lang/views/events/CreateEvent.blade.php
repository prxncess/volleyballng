@extends('layout')
@section('extra-style')
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap-datepicker.standalone.min.css')}}" rel="stylesheet" type="text/css">
    @endsection
@section('title','Events Calender')
@section('content')

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>

        <p>
            Check out our upcoming events, or register your own event!

        </p>

    </aside>
    <div id="events-subnav">
        <a href="{{route('events')}}" >Events</a>
        <a href="{{route('EventsCal')}}" class="">Calendar</a>
        <a href="{{route('newEvent')}}" class="active">Register Event</a>
    </div>

    <section id="vb-event-form">
        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="event-form">
            {{csrf_field()}}
            <h2 class="text-center">Register an event</h2>
            {{--@foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach--}}
            @if(session('status') && session('status')=='success')
                <div class="alert alert-success">All done! Your event has been created and we'll get in touch as soon as it's approved. </div>
            @endif
            <h5><i class="fa fa-file-text-o right-10"></i> Event information (all fields required)</h5>
            <div id="yellow-separator"></div>
            <div class="form-group">

                <div class="col-sm-12">
                    <label>Event Title</label>
                    <input type="text" class="form-control" placeholder="event title" value="{{old('event_title')}}" id="event-title" name="event_title">
                    <p class="error">@if($errors->has('event_title')) {{$errors->first('event_title')}} @endif</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Location</label>
                    <select name="event_location" id="event-loaction" class="form-control">
                        <option value="">Select event location</option>
                        @foreach($states as $state=>$v)
                            @if($v == old('event_location'))
                            <option value="{{$v}}" selected>{{$v}}</option>
                            @else
                                <option value="{{$v}}">{{$v}}</option>
                                @endif
                            @endforeach
                    </select>
                    <p class="error">@if($errors->has('event_location')) {{$errors->first('event_location')}} @endif</p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-12">
                    <label>Event poster</label>
                    <input type="file" class="form-control" placeholder="" value="@if(null!==old('event_poster')) {!! old('event_poster') !!} @endif" id="event-poster" name="event_poster">
                    <p class="error">@if($errors->has('event_poster')) {{$errors->first('event_poster')}} @endif</p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-6">
                    <label>Start date</label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker"  value="{{old('event_start')}}" id="event-start" name="event_start">
                    <p class="error">@if($errors->has('event_start')) {{$errors->first('event_start')}} @endif</p>
                </div>
                <div class="col-sm-6">
                    <label>End date</label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker" id="event-end"  value="{{old('event_end')}}" name="event_end">
                    <p class="error">@if($errors->has('event_end')) {{$errors->first('event_end')}} @endif</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Event description</label>


                    <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5">{{old('event_description')}}</textarea>
                    <small><i>Not less than 50 characters</i></small>
                    <p class="error">@if($errors->has('event_description')) {{$errors->first('event_description')}} @endif</p>
                </div>
            </div>
            <h5><i class="fa fa-address-book-o"></i> Organizer's Information</h5>
            <div id="yellow-separator"></div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Organizer's Name</label>
                    <input type="text" class="form-control" placeholder="Event Organizer"  value="{{old('event_organizer')}}" id="event-organizer" name="event_organizer">
                    <p class="error">@if($errors->has('event_organizer')) {{$errors->first('event_organizer')}} @endif</p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-7">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" id="event_email"  value="{{old('event_email')}}" name="event_email">
                    <p class="error">@if($errors->has('event_email')) {{$errors->first('event_email')}} @endif</p>
                </div>
                <div class="col-sm-5">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="phone" id="event_phone"  value="{{old('event_phone')}}" name="event_phone">
                    <p class="error">@if($errors->has('event_phone')) {{$errors->first('event_phone')}} @endif</p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-12">

                    <input type="checkbox" class="right-10" placeholder="" id="event-terms" name="event_terms"> I agree to the <a href="/terms"> terms & conditions</a>
                    <p class="error">@if($errors->has('event_terms')) {{$errors->first('event_terms')}} @endif</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>

            </div>


        </form>
    </section>


    @endsection
@section('footer-scripts')
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $('#event-start').datepicker({
            format: 'yyyy-mm-dd',
        });
        $('#event-end').datepicker({
            format: 'yyyy-mm-dd',
        });

    </script>
    @endsection
