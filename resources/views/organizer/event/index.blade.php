@extends('organizer.layout')
@section('title','My Events')

@section('content')
    <section id="orgEvents">

            <ol class="breadcrumb">
                <li class="breadcrumb-item-active">Events</li>
            </ol>


            <div class="well well" id="admin-box">
                <header>
                    <h2 class=""><i class="fa fa-paperclip"></i> My Events</h2>
                    <div id="" class="gray-separator top-10 bottom-40"></div>
                    <a href="{{route('ogNewEvent')}}" class="float-right btn btn-purple bottom-10"><i class="fa fa-plus"></i> New event</a>
                </header>
                @if(session('res'))
                    <div class="alert alert-danger">{{session('res')}}</div>
                @endif
                @if($events->isEmpty())
                    <div class="alert alert-warning">You have not created any events yet. Click the button above to create a new one!</div>
                @else
                    {{--show events--}}
                    @foreach($events as $event)

                        <div class="media">

                            <div class="media-left">
                                @if($event->image !='')
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
                                  <li class=""><p><b>Location: </b> {{$event->e_location}}</p></li>
                                  <li class=""><p><b>Start date: </b> {{date('jS F Y',$event->start_date)}}</p></li>
                                  <li class=""><p><b>End date:</b> {{date('jS F Y',$event->end_date)}}</p></li>
                                </ul>

                                <div class="top-20"></div>

                                <a href="{{route('upEvent',$event->slug)}}" class="right-10"><i class="fa fa-edit fa-fw"></i><b>Edit</b></a>
                                <a href="{{route('viewEvent',$event->slug)}}" class="right-10"><i class="fa fa-chevron-circle-right fa-fw"></i> <b>Open</b></a>

                            </div>
                            <div class="gray-separator top-20 bottom-20"> </div>
                        </div>


            @endforeach
            @endif
            </div>

    </section>
    @endsection
