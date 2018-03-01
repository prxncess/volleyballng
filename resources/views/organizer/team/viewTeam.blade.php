@extends('organizer.layout')
@section('title')
    {{'Team '.$team->name.' Overview'}}
    @endsection

@section('content')
    {{--
    //think things on purpose
    1 im in right standing with God
    2 I will not bow down to fear
    3 i can do whatever i ever need to do in my life(noting is too much for you do if its the right thing God is calling you to do)
    # what ever comes up in my life im going to have a positive attitude. i can handle it
    # i believe something good is going to happen to me today
    4 i obey God promtly exdous 24 vs 7,
    # no excuses only results
    5 i dont make decisions based on my feelings

    --}}
    <div class="" id="">
        <section id="teamOver">
            <header id="teamName" class="">
                <h2 class="text-center">{{$team->name}}</h2>
            </header>
            <div class="" id="teamGroup">
                <img src="{{asset('images/team_logos/teamImage.jpg')}}" class="img-responsive">
            </div>
            <div id="teamIn">
                <div class="media">
                    <div class="media-left">
                            <img src="{{asset('images/ball.png')}}" class="media-object">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">{{$team->name}}</h3>
                        <p>{{wordwrap($team->description,100)}}</p>
                    </div>
                    
                </div>
            </div>
            <div id="teamOth">
                <aside>
                    <ul class="nav nav-tabs center-block">
                        <li ><a data-toggle="tab" href="#over">Overview</a></li>
                        <li class="active"><a data-toggle="tab" href="#squad">Squad</a></li>
                        <li><a data-toggle="tab" href="#stats">Stats</a></li>
                    </ul>
                </aside>

                <div class="tab-content">
                    <div id="over" class="tab-pane fade ">
                        <h3>HOME</h3>
                        <p>Some content.</p>
                    </div>
                    <div id="squad" class="tab-pane fade in active">
                           <div class="row">
                               @if($team->players->count() >0)
                                   @foreach($team->players as $player)
                                       <div class="col-xs-12 col-sm-6 col-md-4">
                                           <div id="player-card">
                                               <a href="{{route('OgCheckPlayer',[$player->id,$player->lname.'-'.$player->fname])}}">
                                                   <header>
                                                       <div class="media-body">
                                                           <div class="media-left">
                                                               <img src="{{asset('images/team/1511813510.png')}}" class="media-object">
                                                           </div>
                                                           <div class="media-body">
                                                               <h4 class="text-capitalize">{{$player->lname.' '.$player->fname}}</h4>
                                                               <span class="text-capitalize">{{$player->position}}</span>
                                                           </div>
                                                       </div>
                                                   </header>
                                                   <div id="playerInfo">
                                                       <span> <label> Height: </label> {{$player->feet.' '.$player->inches}}</span>
                                                       <hr>
                                                       <button class="btn btn-primary center-block" id="vb-button">View Player<i class="fa fa-arrow-right pull-right"></i></button>

                                                   </div>
                                               </a>
                                           </div>
                                       </div>
                                       @endforeach
                                   @else
                                   <div class="text-center">No players at the moment</div>
                               @endif





                           </div>

                    </div>
                    <div id="stats" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Some content in menu 2.</p>
                    </div>
                </div>
            </div>
            <footer>
                <button class="btn btn-success">Accept Team</button>
                <button class="btn btn-danger">Reject Team</button>
            </footer>
        </section>
    </div>
    @endsection