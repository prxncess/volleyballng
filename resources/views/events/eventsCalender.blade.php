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
                <div id="calendar">
                    {!! $calender !!}
                </div>

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
            $('div#vb-calender').on('change','select#month',function(){

                //get month
                var currentMonth=$('div#vb-calender select#month').val();
                 y=new Date();
                var year= y.getFullYear();
               //send value to ajax
                $.ajax({
                    url:'{{route('getEvents')}}',
                    data:{'month':currentMonth,'year':year},
                    type:"GET",
                    success:function(data){
                        //display calender
                        $('div#vb-calender div#calendar').html();
                        $('div#vb-calender div#calendar').html(data.calendar)
                    }
                })
            })
            //get events of the day
            $('div#vb-calender').on('click','td.has-event',function(event){
                var day=$(this).context.innerHTML
               //get month
                var month=$('div#vb-calender select#month').val();
                //pass values to the database
                $.ajax({
                    url:"{{route('getDayEvents')}}",
                    type:"GET",
                    data:{'month':month,'day':day},
                    success:function(data){
                        var eve='';
                        events=data.allEvents;
                        //check if events is more than 0
                        if(events.length>0){
                            //update schedule header
                            $('div#vb-calender div#vb-schedules header h3').html('<i class="fa fa-calendar-check-o"></i> Events for '+data.dateFormat);
                            //update event count
                            $('div#vb-calender div#vb-schedules header span#schedule-count').html('('+events.length+') Events');
                            //loop events
                            for(i in events){
                                eve+='<div class="col-md-4"><div class="media"><div class="media-left"><img src="images/event/'+events[i].image+'" style="width: 80px"> </div> <div class="media-body"> <div class="media-heading"><h4><a href="Event/'+events[i].slug+'">'+events[i].title+'</a></h4></div> <ul class="media-list"> <li><strong>Location:</strong><span>'+events[i].e_location+'</span></li> <li>'+events[i].description+'</li> </ul> </div> </div> </div>';
                            }
                            $('div#vb-calender div#vb-schedules div#schedule div.row').html(eve);

                        }
                    }
                })
            })
        })
    </script>
    @endsection
