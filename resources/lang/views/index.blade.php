@extends('layout')
@section('title','Welcome to Volleyball.ng')
@section('banner')
    <div id="home-banner">
        <div id="banners" class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
                <div class="swiper-slide"  style="background: url('{!! asset('images/banner1.png') !!}'); height: 400px; background-size: 100% 100% "></div>
                <div class="swiper-slide" style="background: url('{!! asset('images/banner2.png') !!}');height: 400px; background-size: 100% 100%;"></div>
                <div class="swiper-slide" style="background: url('{!! asset('images/banner3.png') !!}');height: 400px; background-size: 100% 100%;"></div>
            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                <span class="swiper-pagination-bullet"></span>
                 <span class="swiper-pagination-bullet"></span>>
            </div>

        </div>
    </div>
    @endsection
@section('content')

    <section id="our-home">
        <header id="tagline">
            <h1 class="text-center">PLAY. WATCH. LAUGH</h1>
            <p>  Welcome to the home of Volleyball in Nigeria</p>


        </header>
        <article>
            <header><a href="{{route('events')}}"><h2><i class="fa fa-calendar"></i> Events</h2></a>

                <div id="yellow-separator"></div>
                <div class="row">
                  <div class = "col-xs-6"><p>Coming up next...</p></div>
                  <div class = "col-xs-6 text-right"><a href="{{route('newEvent')}}" class="btn btn-purple"><i class="fa fa-plus right-5"></i>Create Event</a></div>
                </div>
                <!-- <p>
                    See what we have been up to.<a href="{{route('newEvent')}}"><span class="pull-right"><i class="fa fa-plus"></i>Create Event</span></a>
                </p> -->
            </header>

        </article>
        <div id="slides" class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
                @if($events->isEmpty())
                   {{--no open events at the moment display blog post--}}
                <div class="swiper-slide swiper-slide-active">
                    <div id="box">
                        <a href="{!! route('viewEvent','conferdrations-cup') !!}">
                            <img src="{{asset('images/IMG_20170222_070951.jpg')}}">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p> <a href="{!! route('viewEvent','conferdrations-cup') !!}"> Lagos Cup. 2016</a></p>
                    </header>
                </div>
                <div class="swiper-slide">
                    <div id="box">
                        <a href="{!! route('viewEvent','conferdrations-cup') !!}">
                            <img src="{{asset('images/IMG_20170222_070926.jpg')}}">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p><a href="{!! route('viewEvent','conferdrations-cup') !!}"> Lagos trial. 2017</a></p>
                    </header>
                </div>
                <div class="swiper-slide">
                    <div id="box">
                        <a href="{!! route('viewEvent','conferdrations-cup') !!}">
                            <img src="{{asset('images/IMG_20170222_070958.jpg')}}">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p><a href="{!! route('viewEvent','conferdrations-cup') !!}"> Open PH. 2017</a></p>
                    </header>
                </div>
                    @else
                    @foreach($events as $event)
                        <div class="swiper-slide swiper-slide-active">
                            <div id="box">
                                <a href="{!! route('viewEvent',$event->slug) !!}">
                                    <img src="{{asset('images/event/'.$event->image)}}">
                                    <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                                </a>

                            </div>

                            <header>
                                <div id="bar"></div>
                                <p> <a href="{!! route('viewEvent',$event->slug) !!}">{{$event->title}}</a></p>
                            </header>
                        </div>
                    @endforeach

                @endif
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>

        <div class="gray-background top-bottom-padding-40">
          <article>
            <header>
                <a href="{{route('viewTeams')}}"><h2><i class="fa fa-group"></i> Teams</h2></a>
                <div id="yellow-separator"></div>
                <div class="row">
                  <div class="col-sm-6"><p>Groups of volleyball <a href="{{route('viewTeams')}}">lovers</a>, players, coaches, etc</p></div>
                  <div class="col-sm-6 text-right"><a href="{{route('register')}}" class="btn btn-purple"><i class="fa fa-plus right-5"></i> Register a team</a></div>
                </div>
                <!-- <p>Check out our <a href="{{route('viewTeams')}}">Teams</a> . <a href="{{route('register')}}"><span class="pull-right"><i class="fa fa-plus"></i> Register</span></a></p> -->

            </header>
          </article>
          <article id="vb-home-team">
              <div id="team-slides" class="swiper-container swiper-container-horizontal">

                  <div class="swiper-wrapper">
                      <div class="swiper-slide swiper-slide-active" >
                          <div id="box">
                              <a href="teams/hello">
                                  <img src="{!! asset('images/IMG_20170222_071011.jpg') !!}">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3> </div>
                              </a>

                          </div>

                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Bulls</a></p>
                          </header>
                      </div>
                      <div class="swiper-slide" >

                          <div id="box">
                              <a href="teams/hello">
                                  <img src="{!! asset('images/IMG_20170222_070951.jpg') !!}">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3></div></a>

                          </div>
                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Sharks</a></p>
                          </header>
                      </div>
                      <div class="swiper-slide swiper-slide-active" >
                          <div id="box">
                              <a href="teams/hello">
                                  <img src="{!! asset('images/IMG_20170222_071011.jpg') !!}">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3></div>
                              </a>

                          </div>

                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Shells</a></p>
                          </header>
                      </div>
                  </div>
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              <div id="overlay"></div>
          </article>
        </div>


        <article id="gallery">

            <header>
                <a href="{{route('viewGallery')}}">
                    <h2><i class="fa fa-image"></i> Gallery</h2>
                </a>

            </header>
            <div id="yellow-separator"></div>
            <p>
                Memories of past events...
            </p>

        </article>
        <div id="event-preview" class="row">
            <div class="">
                <div id="preview" class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                    <div id="box">
                        <a href="{{route('viewGallery')}}">
                            <img src="{{asset('images/IMG_20170222_070926.jpg')}}" class="img-responsive" >
                            <div id="more-photos"> <i class="fa fa-image"></i></div>
                        </a>

                    </div>

                    <header><h4>Photos</h4></header>
                </div>
                <div id="preview" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div id="box">
                        <a href="{{route('viewGallery')}}">
                            <img src="{{asset('images/IMG_20170222_070951.jpg')}}" class="img-responsive" >
                            <div id="more-videos"> <i class="fa fa-play-circle-o"></i> </div>
                        </a>

                    </div>
                    <h4 class="blue">Videos</h4>


                </div>
            </div>

            {{--<div id="preview" class="col-xs-12  col-sm-4 col-md-4">
                <div id="more"><a href="{{route('viewGallery')}}">More</a></div>
                <img src="{{asset('images/IMG_20170222_070958.jpg')}}">
                 <p id="preview-title">Lagos open</p>
                <span><i class="fa fa-play-circle"></i></span>
            </div >--}}
        </div>
    </section>
    @endsection
@section('footer-scripts')
    <script type="text/javascript">

    </script>
    @endsection
