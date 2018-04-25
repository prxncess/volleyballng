@extends('admin.layout')
@section('title','volleyball events');
@section('content')

    <section>
        <ol class="breadcrumb">
            <li class="breadcrumb-item-active">Events</li>
        </ol>

        <div class="well well" id="admin-box">
            <header>
                <h2 class=""><i class="fa fa-paperclip"></i> Events</h2>
                <div id="" class="gray-separator top-10 bottom-40"></div>
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
                        @if($event->image!='')
                        <img class="media-object" src="{{asset('images/event/'.$event->image)}}" style="width: 80px">
                            @else
                            <img class="media-object" src="{{asset('images/seuww.png')}}" style="width: 80px">
                        @endif
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$event->title}}</h4>

                    </div>
                    <div class="media-bottom">
                        <p class="top-20">{{$event->description}}</p>
                        <ul class="list-unstyled top-20">
                            <li><i class=""></i><p><strong>Location:</strong> {{$event->e_location}}</p> </li>
                            <li><i class=""></i><p><strong>Organizer:</strong> {{$event->organizer[0]->organizer}}</p> </li>
                            <li><i class=""></i><p><strong>Email:</strong> {{$event->organizer[0]->email}}</p> </li>
                        </ul>

                        <div class="top-20"></div>

                        <p>
                          <a href="{{route('editEvent',$event->slug)}}" class="right-10"><i class="fa fa-edit fa-fw"></i><b>Edit</b></a>
                          <a href="{{route('showEvent',$event->slug)}}" class="right-10"><i class="fa fa-chevron-circle-right fa-fw"></i> <b>More</b></a>
                        </p>

                    </div>
                    <div class="gray-separator top-20 bottom-20"> </div>
                </div>


                    @endforeach
            @endif
            <div class="center-block">
                {{$events->links()}}
            </div>
        </div>
        </section>

    @endsection
