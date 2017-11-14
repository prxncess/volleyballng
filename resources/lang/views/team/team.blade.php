@extends('layout')
@section('title','Teams')
@section('content')

    <section id="viewTeam">
        <header id="container">
            <h2>Team</h2>
            <div id="yellow-separator"></div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item active">{{$team->name}}</li>
        </ol>
        </header>
        <section id="container">
            <h3 class="text-uppercase text-center">Team profile</h3>
            <div id="yellow-separator"></div>
            <div id="team=profile">
                <img  id="team-image"src="images/team_logos/teamImage.jpg" class="img-responsive">
                <div id="team-data">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.
                        Ergo hoc quidem apparet, nos ad agendum esse natos. Quid enim de amicitia statueris utilitatis causa expetenda vides. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.
                        Ergo hoc quidem apparet, nos ad agendum esse natos. Quid enim de amicitia statueris utilitatis causa expetenda vides.
                    </p>
                </div>
                <div id="team-staff">
                    <div class="row" id="container">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h3 class="text-uppercase text-center">Coach</h3>
                            <div id="yellow-separator"></div>
                            @if($teamCoach)
                            <div class="media">
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
                            <h3 class="text-uppercase text-center">Staff</h3>
                            <div id="yellow-separator">
                                <ul class="list-inline">
                                    <li><span class="role">Team manager</span>
                                    <strong>@if($teamManager)){{$teamManager->fname.' '.$teamManager->lname}} @endif</strong>
                                    {{--</li>
                                    <li><span class="role">Physiotherapist</span>
                                        <strong>Agada Johnson</strong>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('viewPlayers',$team->name)}}" class="btn btn-primary">View Players</a>
        </section>
    </section>
    @endsection