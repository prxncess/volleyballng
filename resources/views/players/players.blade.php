@extends('layout')
@section('title','Players')
@section('content')
    <section id="viewPlayers">
        <header id="container">
            <h2>Players</h2>
            <div id="yellow-separator"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
                <li class="breadcrumb-item"><a href="{{route('viewTeam')}}"> Pirates</a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
        </header>

        <div id="players">

            <div class="row">
                @for($i=1;$i<=9;$i++)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{route('viewPlayer')}}"> <img src="images/team_logos/male.png" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <a href="{{route('viewPlayer')}}"> <h4 class="media-heading">Martins Paula</h4></a>
                                <ul class="list-unstyled">
                                    <li><span class="role">Position: </span> <strong>Middle Blocker</strong> </li>
                                    <li><span class="role">Height: </span> <strong>200cm</strong> </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    @endfor

            </div>

        </div>
    </section>
    @endsection
