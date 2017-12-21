@extends('layout')
@section('title','Events Calender')
@section('content')

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>
        <p>
            Check out our exciting upcoming events and register your team!. Also create your own event and we'll publish it here.

        </p>

    </aside>
    <div id="events-subnav">
      <div class="row">
        <div class="col-sm-4">
          <a href="{{route('events')}}" >Events</a>
        </div>
        <div class="col-sm-4">
          <a href="{{route('EventsCal')}}" class="active">Calendar</a>
        </div>
        <div class="col-sm-4">
          <a href="{{route('newEvent')}}" class="">Register Event</a>
        </div>
      </div>
    </div>
    <div class="row">
        <div id="vb-calender" class=" col-md-12">
            <div class="">
                <h3 class="text-center">Calendar</h3>
                {!! $calender !!}
                <div id="vb-schedules">
                    <header><h3><i class="fa fa-calendar-check-o"></i> Events for {{date(' jS F Y')}}</h3>
                        <span id="schedule-count" class="text-info">({{$currentEvents->count()}}) Events</span>
                    </header>

                    <div id="schedule">
                        <div class="row">
                            @if($currentEvents->isEmpty())
                                <p>No events scheduled for today</p>
                                @else
                                @foreach($currentEvents as $event)
                                    <div class="col-md-4">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="images/event/{{$event->image}}" style="width: 80px">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading"><h4><a href="{{route('viewEvent',$event->slug)}}">{{$event->title}}</a></h4></div>
                                                <ul class="media-list">
                                                    <li><strong>Location:</strong><span> {{$event->e_location}}</span></li>
                                                    <li>{{$event->description}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>

    @endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('div#vb-calender span.prev-month').on('click',function(){
                console.log('prev')
            })

            $('div#vb-calender span.next-month').on('click',function(){
                console.log('next')
            })
            $('div#vb-calender select.month').on('change',function(){
                console.log($('select.month').val())
            })
        })
    </script>
    @endsection
