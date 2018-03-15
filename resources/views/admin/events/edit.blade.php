@extends('admin.layout')
@section('title','Create Event');
@section('content')

    <section id="updateEvent">
        <div id="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Events')}}"> events</a></li>
                <li class="breadcrumb-item active">{{$event->title}}</li>
            </ol>
            <div class="well well" id="admin-box">
                <header>
                    <h3>Update event</h3>
                    <div id="separator"></div>
                </header>

                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="event-form">
                    {{csrf_field()}}
                    {{--@foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach--}}
                    @if(session('status') && session('status')=='updated')
                        <div class="alert alert-success"> Event successfully created </div>
                    @endif
                    <h5><i class="fa fa-file-text-o"></i> Event information</h5>
                    <div id="separator"></div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <label>Event Title</label>
                            <input type="text" class="form-control text-capitalize" placeholder="the next big six" value="{{$event->title}}" id="event-title" name="event_title">
                            <p class="error">@if($errors->has('event_title')) {{$errors->first('event_title')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Location</label>
                            <select name="event_location" id="event-loaction" class="form-control">
                                <option value="">Select one</option>
                                @foreach($states as $state)
                                    @if($event->e_location==$state)
                                    <option value="{{$event->e_location}}" selected>{{$event->e_location}}</option>
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
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" {{--data-provide="datepicker"--}}  value="{{$event->start_date?date('Y-m-d',$event->start_date):old('event_start')}}" id="event-start" name="event_start">
                            <p class="error">@if($errors->has('event_start')) {{$errors->first('event_start')}} @endif</p>
                        </div>
                        <div class="col-sm-6">
                            <label>End date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" {{--data-provide="datepicker"--}} id="event-end"  value="{{$event->end_date?date('Y-m-d',$event->end_date):old('end_start')}}" name="event_end">
                            <p class="error">@if($errors->has('event_end')) {{$errors->first('event_end')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Event description</label>
                            <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5">{{$event->description}}</textarea>
                            <p class="error">@if($errors->has('event_description')) {{$errors->first('event_description')}} @endif</p>
                        </div>
                    </div>
                    <h5><i class="fa fa-address-book-o"></i> Organizer's Information</h5>
                    <div id="separator"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Organizer's Name</label>
                            <input type="text" class="form-control text-capitalize" placeholder="osas bara"  value="{{$event->organizer[0]->organizer}}" id="event-organizer" name="event_organizer">
                            <p class="error">@if($errors->has('event_organizer')) {{$errors->first('event_organizer')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-7">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="os@volleyball.ng" id="event_email"  value="{{$event->organizer[0]->email}}" name="event_email">
                            <p class="error">@if($errors->has('event_email')) {{$errors->first('event_email')}} @endif</p>
                        </div>
                        <div class="col-sm-5">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="08021234567" id="event_phone"  value="{{$event->organizer[0]->phone}}" name="event_phone">
                            <p class="error">@if($errors->has('event_phone')) {{$errors->first('event_phone')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <select class="form-control" name="event_status">
                                @foreach($status as $stat)
                                    @if($stat==$event->status)
                                        <option value="{{$event->status}}" selected>{{$event->status}}</option>
                                    @else
                                        <option value="{{$stat}}" >{{$stat}}</option>
                                    @endif
                                @endforeach

                            </select>
                            <p class="error">@if($errors->has('event_status')) {{$errors->first('event_status')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn vb-button">Update</button>
                        </div>

                    </div>


                </form>
            </div>
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
            startDate: date,
        });

    </script>
@endsection
