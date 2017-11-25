@extends('layout')
@section('title','Team player')
@section('content')
    <section id="viewPlayer">
        <header>
            <h3>Team</h3>
            <div id="yellow-separator"></div>
        </header>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item"><a href="{{route('seeTeam',$team->name)}}"> {{$team->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('viewPlayers',$team->name)}}"> Players</a></li>
            <li class="breadcrumb-item active">Paul Martins</li>
        </ol>
        <aside>
            <div class="row">
                <div class="col-xs-12 col-sm-4  " id="player_image">
                     <img src="images/team/players/{{$player->player_image}}" class="media-object">
                </div>
                <div class=" col-xs-12 col-sm-4  {{--col-md-2 col-md-offset-8--}}" id="player_info">
                     <span class="media-heading">{{$player->fname.' '.$player->lname}}</span>
                    <ul class="list-unstyled">
                        <li><span class="role">Position: </span> <strong>{{$player->position}}r</strong> </li>
                        <li><span class="role">Height: </span> <strong>{{$player->feet.' '.$player->inches}}</strong> </li>

                    </ul>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </aside>
    </section>
    @endsection