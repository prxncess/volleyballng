@extends('admin.layout')
@section('title','volleyball events');
@section('content')

    <div id="ad-Events" class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item-active">Events</li>
        </ol>

        <div class="well well" id="admin-box">
            <header>
                <h3 class="text-center"><i class="fa fa-paperclip"></i> Event</h3>
                <div id="" class="purple-separator top-10 bottom-20"></div>
                <a href="{{route('createEvent')}}" class="float-right btn btn-purple bottom-10"><i class="fa fa-plus"></i> New event</a>
            </header>
            @if(session('res'))
            <div class="alert alert-danger">{{session('res')}}</div>
            @endif
            @if($events->isEmpty())
                <div class="alert alert-warning">No events yet. Watch this space, or create an event!</div>
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
                        <p class="">{{$event->description}}</p>
                        <ul class="list-unstyled list-inline">
                            <li><i class=""></i><strong>Loaction:</strong> <span>{{$event->e_location}}</span> </li>
                            <li><i class=""></i><strong>Organizer:</strong> <span>{{$event->e_organizer}}</span> </li>
                            <li><i class=""></i><strong>Contact:</strong> <span>{{$event->e_email}}</span> </li>
                        </ul>
                        <p>
                            <a href="{{route('showEvent',$event->slug)}}" class="right-10"><i class="fa fa-ellipsis-h right-5"></i> More</a>
                            <a href="{{route('editEvent',$event->slug)}}" class="right-10"><i class="fa fa-edit right-5"></i>Edit</a>
                        </p>

                    </div>
                    <div id="separator"></div>
                </div>


                @endforeach
            @endif
            <div class="center-block">
                {{$events->links()}}
            </div>

        </div>
    </div>
    @endsection
