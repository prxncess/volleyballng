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
            <li class="breadcrumb-item"><a href="{{route('viewTeam')}}"> Pirates</a></li>
            <li class="breadcrumb-item"><a href="{{route('viewPlayers')}}"> Players</a></li>
            <li class="breadcrumb-item active">Paul Martins</li>
        </ol>
        <aside>
            <div class="row">
                <div class="col-xs-12 col-sm-4  " id="player_image">
                     <img src="images/team_logos/male.png" class="media-object">
                </div>
                <div class=" col-xs-12 col-sm-4  {{--col-md-2 col-md-offset-8--}}" id="player_info">
                     <h4 class="media-heading">Martins Paula</h4>
                    <ul class="list-unstyled">
                        <li><span class="role">Position: </span> <strong>Middle Blocker</strong> </li>
                        <li><span class="role">Height: </span> <strong>200cm</strong> </li>

                    </ul>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </aside>
    </section>
    @endsection