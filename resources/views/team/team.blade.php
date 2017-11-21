@extends('layout')
@section('title','Teams')
@section('content')

    <section id="viewTeam">
        <header id="container">
            <h2>Team</h2>
            <div class="purple-separator"></div>

        <ol class="breadcrumb top-40">
            <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item active">{{$team->name}}</li>
        </ol>
        </header>
        <section id="container">
            <h3 class="text-uppercase text-center">Profile</h3>
            <div id="team-profile" class="top-20">
                @if($team->team_image==null)
                    <img  id="team-image"src="images/team_logos/teamImage.jpg" class="img-responsive center-block" >
                @else
                    <img src="{{asset('images/team/group/'.$team->team_image)}}" class="img-responsive center-block" id="team-image">
                @endif


                <div id="team-data" class="text-center">
                    <p>{{$team->description}}</p>

                <!-- <div id="team-data">
                    <p>{{$team->description}}
                    </p> -->

                </div>
                <div id="team-staff">
                    <div class="row" id="">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h3 class="text-uppercase">Coach</h3>
                            <div class="yellow-separator"></div>
                            @if($teamCoach)
                            <div class="media top-20">
                                <div class="media-left">
                                    @if($teamCoach->image=='')
                                        <img src="{!! asset('images/user.jpg') !!}" class="media-object">
                                    @else
                                        <img src="images/team/{{$teamCoach->image}}" class="media-object">
                                    @endif

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$teamCoach->fname.' '.$teamCoach->lname}}</h4>
                                    <p>{{$teamCoach->description}}</p>
                                </div>
                            </div>
                                @endif
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6" id="staffs">
                            <h3 class="text-uppercase">Staff</h3>
                            <div class="yellow-separator"></div>
                            <ul class="list-inline top-20">
                                <li><span class="role">Team manager</span>
                                <strong>@if($teamManager)){{$teamManager->fname.' '.$teamManager->lname}} @endif</strong>
                                </li>
                                <!-- <li><span class="role">Physiotherapist</span>
                                    <strong>Agada Johnson</strong>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('viewPlayers',$team->name)}}" class="btn btn-primary top-20">View Players</a>
        </section>
    </section>
    @endsection
