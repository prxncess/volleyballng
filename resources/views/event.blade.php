@extends('layout')
@section('title','Events')
@section('content')

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>
        <p>
            Check out our exciting upcoming events and register your team!. Also create your own event and we'll publish it here.

        </p>
        <p></p>

    </aside>
    <div id="events-subnav">
        <a href="{{route('events')}}" class="active">Events</a>
        <a href="{{route('EventsCal')}}">Calender</a>
        <a href="{{route('newEvent')}}">Register Event</a>
    </div>
    <div id="bd-event" >
        <div class="row">
            <div id="event-list" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="row">
                     @if($events->isEmpty())
                         <h3>We currently have no events open at the moment please do check back</h3>
                         @else
                         @foreach($events as $event)
                             <div id="event-thumb" class="col-md-3  col-sm-4  col-xs-12">
                                 <h3><a href="{{route('viewEvent',$event->slug)}}">{!! $event->title !!}</a></h3>
                                 <img src="{{asset('images/event/'.$event->image)}}">
                                 <header>
                                     <div id="bar"></div>
                                     <p>{!! $event->description !!} <a href="{{route('viewEvent',$event->slug)}}">More</a> </p>
                                 </header>
                             </div>
                         @endforeach
                         @endif
                 </div>
            </div>

        </div>
        <div class="center-block">
            {{--{{$events->links()}}--}}
        </div>

    </div>
{{--    <div id="access" class=" list-inline list-unstyled">
        <aside class="" >
            <form class="" method="post"action="">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <label class="input-group-addon"><i class="fa fa-search"></i> </label>
                    </div>
                </div>
            </form>
        </aside>
        <aside class="pull-right">
            <div class="dropdown" style="display: inline-block">
                Filter
                <button type="button" class="btn btn-default dropdown-toggle" id="filterDrop" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-caret-down"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDrop">
                    <li><a href="#">By month</a> </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">By location</a> </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">By club</a> </li>
                </ul>
            </div>
        </aside>

    </div>
    <div id="slides" class="swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-active">
                <img src="images/IMG_20170222_070951.jpg">
                <header>
                    <div id="bar"></div>
                    <p> <a href="{!! route('viewEvent') !!}"> Lagos Cup. 2016</a></p>
                </header>
            </div>
            <div class="swiper-slide">
                <img src="images/IMG_20170222_070926.jpg">
                <header>
                    <div id="bar"></div>
                    <p><a href="{!! route('viewEvent') !!}"> Lagos trial. 2017</a></p>
                </header>
            </div>
            <div class="swiper-slide">
                <img src="images/IMG_20170222_070958.jpg">
                <header>
                    <div id="bar"></div>
                    <p><a href="{!! route('viewEvent') !!}"> Open PH. 2017</a></p>
                </header>
            </div>
            <div class="swiper-slide">
                <img src="images/IMG_20170222_071011.jpg">
                <header>
                    <div id="bar"></div>
                    <p><a href="{!! route('viewEvent') !!}"> League Selection. 2018</a></p>
                </header>
            </div>
            <div class="swiper-slide">
                <img src="images/IMG_20170222_070951.jpg">
                <header>
                    <div id="bar"></div>
                    <p><a href="{!! route('viewEvent') !!}"> Lagos Cup. 2016</a></p>
                </header>
            </div>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <div id="league-list">
        <div class="media">
            <div class="media-left">
                <a href="{!! route('viewEvent') !!}">
                    <img class="media-object" src="images/IMG_20170222_070958.jpg" alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Lagos Cup</h4>
                <p>ikejia, Lagos</p>
                <p>September</p>
            </div>
        </div>
        <div id="yellow-separator"></div>
        <div class="media">
            <div class="media-left">
                <a href="{!! route('viewEvent') !!}">
                    <img class="media-object" src="images/IMG_20170222_070951.jpg"  alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Open PH.</h4>
                <p>Gra, Port Harcourt</p>
                <p>November, 2017</p>
            </div>
        </div>
        <div id="yellow-separator"></div>
        <div class="media">
            <div class="media-left">
                <a href="{!! route('viewEvent') !!}">
                    <img class="media-object" src="images/IMG_20170222_070930.jpg" alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">League Slection</h4>
                <p>Oregun Lagos</p>
                <p>February 2018 </p>
            </div>
        </div>
    </div>--}}
@endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var calender= new Swiper('#bd-calender',{
                /*pagination: '.swiper-pagination',*/
                nextButton: '.swiper-button-next',
                 prevButton: '.swiper-button-prev',
                /*paginationClickable: true,*/
                spaceBetween: 1,
               /* centeredSlides: true,*/
                //autoplay: 2500,
                slidesPerView:'auto',
                /*autoplayDisableOnInteraction: false*/
            })
        })
    </script>
    @endsection