@extends('organizer.layout')
@section('title')
    {{'Edit:'.$event->title}}
    @endsection

@section('content')
    <section>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('myEvents')}}">Events</a></li>
            <li class="breadcrumb-item-active">{{$event->title}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2> <i class="fa fa-paper"></i> Complete {{$event->title}} Information</h2>
                <div id="separator"></div>
            </header>
            <div>
                <form method="post" class="form-horizontal"  enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Event Title</label>
                            <input type="text" class="form-control text-capitalize" placeholder="Taraba Tournament" value="{{$event->title}}" id="event-title" name="event_title">
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
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker"  value="{{date('Y-m-d',$event->start_date)}}" id="event-start" name="event_start">
                            <p class="error">@if($errors->has('event_start')) {{$errors->first('event_start')}} @endif</p>
                        </div>
                        <div class="col-sm-6">
                            <label>End date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker" id="event-end"  value="{{date('Y-m-d',$event->end_date)}}" name="event_end">
                            <p class="error">@if($errors->has('event_end')) {{$errors->first('event_end')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Event description</label>
                            <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5">{{$event->description}}</textarea>
                            <small><i>Not less than 50 characters</i></small>
                            <p class="error">@if($errors->has('event_description')) {{$errors->first('event_description')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="vb-button" class="btn btn-primary">Save and request review</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


    @endsection