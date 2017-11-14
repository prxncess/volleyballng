@extends('admin.layout')
@section('title','volleyball Event')
@section('content')

    <div id="show-event container" class="">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Events')}}">Events</a> </li>
                <li class="breadcrumb-item-active">{{$event->title}}</li>
            </ol>
        <div id="admin-box" class="well well">
            {{--<div id="events-subnav">
                <a href="{{route('viewTeams')}}">Event Information</a>
                <a href="{{route('register')}}" class="active">Organizers</a>
                <a href="{{route('teamSignIn')}}">Status</a>
            </div>--}}
            @if(session('status') && session('status')=='updated')
                <div class="alert alert-success">Event status has been updated</div>
            @endif
            <header>
                <h2>Overview</h2>
                <div id="separator"></div>
                <div id="ad-event-info" class="">
                    <img src="{{asset('images/event/'.$event->image)}}" class="img-responsive">
                    <div class="row">
                        <div class="col-sm-5"><strong>Title</strong></div>
                        <div class="col-sm-7">{{$event->title}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Description</strong></div>
                        <div class="col-sm-7">{{$event->description}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Starting on:</strong> {{$event->start_date}}</div>
                        <div class="col-sm-7"><strong>To end on: </strong>{{$event->end_date}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Location</strong></div>
                        <div class="col-sm-7">{{$event->e_location}} state</div>
                    </div>
                    <h4><i class="fa fa-user"></i> Organizer information</h4>
                    <div id="separator"></div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Organizer</strong></div>
                        <div class="col-sm-7">{{$event->e_organizer}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Phone</strong></div>
                        <div class="col-sm-7">{{$event->e_phone}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Email</strong></div>
                        <div class="col-sm-7">{{$event->e_email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>status</strong></div>
                        <div class="col-sm-7">
                            <form method="post" action="{{route('showEvent',$event->slug)}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <select class="form-control" name="status">
                                            @foreach($status as $statu)
                                                @if($statu==$event->status)
                                                    <option value="{{$event->status}}" selected>{{$event->status}}</option>
                                                @else
                                                    <option value="{{$statu}}" >{{$statu}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{route('deleteEvent',$event->slug)}}" class="btn btn-danger " id="delete-event">Delete</a>
                        </div>
                    </div>

                </div>
            </header>
        </div>
    </div>
    @endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete-event').on('click',function(){
                if(confirm('Are you sure you to delete this event')==false){
                    return false;
                }
                //event.preventDefault();


            })
        })
    </script>

    @endsection