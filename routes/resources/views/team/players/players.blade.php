@extends('layout')
@section('title','Players')
@section('content')
    <section id="viewPlayers">
        <header id="container">
            <h2>Players</h2>
            <div id="yellow-separator"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
                <li class="breadcrumb-item"><a href="{{route('seeTeam',$team->name)}}"> {{$team->name}}</a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
        </header>

        <div id="players">

            <div class="row">
                @if(!empty($players))
                    @foreach($players as $player)

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{route('viewPlayer',$player->id)}}"> <img src="images/team/players/{{$player->player_image}}" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <a href="{{route('viewPlayer',$player->id)}}"> <h4 class="media-heading">{{$player->fname.' '.$player->lname}}</h4></a>
                                <ul class="list-unstyled">
                                    <li><span class="role">Position: </span> <strong>{{$player->position}}</strong> </li>
                                    <li><span class="role">Height: </span> <strong>{{$player->height}}</strong> </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                @endif

            </div>

        </div>
    </section>
    @endsection
