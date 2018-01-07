@extends('organizer.layout')
@section('title','My Events')

@section('content')
    <section id="orgEvents">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item-active">Events</li>
            </ol>
        </div>

            <div class="well well" id="admin-box">
                <header>
                    <h2 class=""><i class="fa fa-paperclip"></i> My Events</h2>
                    <div id="" class="purple-separator top-10 bottom-20"></div>
                    <a href="{{route('newEvent')}}" class="float-right btn btn-purple bottom-10"><i class="fa fa-plus"></i> New event</a>
                </header>
                @if(session('res'))
                    <div class="alert alert-danger">{{session('res')}}</div>
                @endif
                @if($events->isEmpty())
                    <div class="alert alert-warning">you have not events at. Watch this space, or create an event!</div>
                @else
                    {{--show events--}}
                    @foreach($events as $event)

                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('images/event/'.$event->image)}}" style="width: 80px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$event->title}}</h4>

                            </div>
                            <div class="media-bottom">
                                <p class="top-20">{{$event->description}}</p>
                                <p>
                                    <ul class="list-unstyled list-inline" >
                                    <li><span><b>Location: </b> {{$event->e_location}}</span></li>
                                    <li><span><b>start date: </b> {{date('jS F Y',$event->start_date)}}-</span></li>
                                    <li><span><b>End Date:</b> {{date('jS F Y',$event->end_date)}}</span></li>
                                </ul>

                                    <a href="" class="right-10"><i class="fa fa-ellipsis-h right-5"></i> More</a>
                                    <a href="{{route('upEvent',$event->slug)}}" class="right-10"><i class="fa fa-edit right-5"></i>Edit</a>
                                </p>

                            </div>
                            <div class="gray-separator top-20 bottom-20"> </div>
                        </div>
            </div>

            @endforeach
            @endif
            <div class="center-block">

            </div>

    </section>
    @endsection