@extends('organizer.layout')
@section('title')
    {{'Team '.$team->name.' Overview'}}
@endsection

@section('content')
    <div class="" id="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('myEvents')}}">events</a> </li>
            <li class="breadcrumb-item-active">{{$team->name}}</li>
        </ol>
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
                        <li class="active"><a data-toggle="tab" href="#over">Overview</a></li>
                        <li ><a data-toggle="tab" href="#squad">Squad</a></li>
                        <li><a data-toggle="tab" href="#stats">Stats</a></li>
                    </ul>
                </aside>

                <div class="tab-content">
                    <div id="over" class="tab-pane fade in active ">
                        <header>
                            <h3>Management Team</h3>
                        </header>
                        <div id="separator"></div>
                        <div id="ogStaff">
                            @if($team->staff->isEmpty())
                                <p>No staff at the moment for this team</p>
                            @else
                                @foreach($team->staff as $staff)
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('images/team/'.$staff->image)}}" width="100px" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="text-capitalize">{{$staff->fname.' '.$staff->lname}}</h4>
                                            <label class="text-uppercase">{{$staff->position}}</label>
                                            <p>{{$staff->description}}</p>
                                            @if($team->staff->count()>1) <div id="separator"></div> @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div id="otherInfor">
                            <header>
                                <h3>Competitions Currently Involved </h3>
                                <div id="separator"></div>
                            </header>
                            <div id="involved"></div>

                            <header>
                                <h3>Previous Competitions </h3>
                                <div id="separator"></div>
                            </header>
                            <div id="prevComp"></div>
                        </div>
                    </div>
                    <div id="squad" class="tab-pane fade ">
                        <div class="row">
                            @if($team->players->count() >0)
                                @foreach($team->players as $player)
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div id="player-card">
                                            <a href="{{route('OgCheckPlayer',[$player->id,$player->lname.'-'.$player->fname])}}">
                                                <header>
                                                    <div class="media">
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
                        <h3>Team Stats</h3>

                    </div>
                </div>
            </div>
            <footer>
               {{-- <form method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="xd" value="{{$team->id}}" >
                    <input type="hidden" name="lx" value="{{$eve->id}}" >
                    <button type="submit" class="btn btn-success">Accept Team</button>
                    <button class="btn btn-danger">Reject Team</button>
                </form>--}}
            </footer>
        </section>
    </div>
@endsection