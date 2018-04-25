@extends('organizer.layout')
@section('title','New Event')
@section('content')
    <section id="orgNewEvent">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('myEvents')}}">Events</a></li>
            <li class="breadcrumb-item-active">Create event</li>
        </ol>
        <div class="well well" id="admin-box">
            <header>
                <h3>Create Event</h3>
                <div class="gray-separator bottom-40"></div>
            </header>

            <form method="post" class="form-horizontal" enctype="multipart/form-data" id="event-form">
                {{csrf_field()}}
                {{--@foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach--}}
               {{-- @if(session('status') && session('status')=='updated')
                    <div class="alert alert-success"> Event successfully created </div>
                @endif--}}
                <!-- <h5><i class="fa fa-file-text-o"></i> Event information</h5>
                <div class="gray-separator bottom-20"></div> -->
                <div class="form-group">

                    <div class="col-sm-12">
                        <label>Event Title</label>
                        <input type="text" class="form-control text-capitalize" placeholder="the next big six" value="{{old('event_title')}}" id="event-title" name="event_title">
                        <p class="error">@if($errors->has('event_title')) {{$errors->first('event_title')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>Location</label>
                        <select name="event_location" id="event-loaction" class="form-control">
                            <option value="">Select one</option>
                            @foreach($states as $state)
                                @if($state==old('event_location'))
                                    <option value="{{$state}}" selected="">{{$state}}</option>
                                @else
                                    <option value="{{$state}}">{{$state}}</option>
                                @endif
                            @endforeach
                        </select>
                        <p class="error">@if($errors->has('event_location')) {{$errors->first('event_location')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-12">
                        <label>Event poster</label>
                        <input type="file" class="form-control" placeholder="" id="event-poster" name="event_poster">
                        <p class="error">@if($errors->has('event_poster')) {{$errors->first('event_poster')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-6">
                        <label>Start date</label>
                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" {{--data-provide="datepicker"--}}  value="{{old('event_start')}}" id="event-start" name="event_start">
                        <p class="error">@if($errors->has('event_start')) {{$errors->first('event_start')}} @endif</p>
                    </div>
                    <div class="col-sm-6">
                        <label>End date</label>
                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" {{--data-provide="datepicker"--}} id="event-end"  value="{{old('event_end')}}" name="event_end">
                        <p class="error">@if($errors->has('event_end')) {{$errors->first('event_end')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>Event description</label>
                        <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5">{{old('event_description')}}</textarea>
                        <p class="error">@if($errors->has('event_description')) {{$errors->first('event_description')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn vb-button">Save and request review</button>
                    </div>
                </div>




            </form>
        </div>
    </section>

    @endsection
@section('footer-scripts')
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate()-1);
        $('#event-start').datepicker({
            format: 'yyyy-mm-dd',
            startDate: date,
        });
        $('#event-end').datepicker({
            format: 'yyyy-mm-dd',
        });

    </script>
@endsection
