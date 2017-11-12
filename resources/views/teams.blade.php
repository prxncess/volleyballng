@extends('layout');
@section('title','Teams')
@section('content')

    <section id="Teams">

        <header id="container">
            <h3>Teams</h3>
            <div id="yellow-separator"></div>
            {{--<a href="{{route('register')}}" id="vb-button" class="btn btn-primary">Team Registration</a>--}}
        </header>
        <div id="events-subnav">
          <div class="row">
            <div class="col-sm-4">
              <a href="{{route('viewTeams')}}" class="active top-bottom-padding-20">Teams</a>
            </div>
            <div class="col-sm-4">
              <a href="{{route('register')}}" class="top-bottom-padding-2">Register a team</a>
            </div>
            <div class="col-sm-4">
              <a href="{{route('teamSignIn')}}" class="top-bottom-padding-20">Team Login</a>
            </div>
          </div>
        </div>

        <div id="vb-teams" class="container top-40">
            <div class="row">
                {{--@php
                $team_name=[1=>'Sharks','Rangers','Ballers','Glaziers','Black Cats','Chiefs','Orlandos','Pirates','Black Stars','Yorks'];
                @endphp
                @for($i=1; $i<=10;$i++)
                <div id="vb-team" class="col-xs-6 col-sm-4 col-md-2">
                    <a href="{{route('viewTeam')}}"> <img src="images/team_logos/team{{$i}}.png" class="">
                    <h4 class="text-center">{{$team_name[$i]}}</h4></a>
                </div>
                    @endfor--}}
                @if(!empty($teams))
                    @foreach($teams as $team)
                    <div id="vb-team" class="col-xs-6 col-sm-4 col-md-2">
                        <a href="{{route('seeTeam',$team->name)}}"> <img src="images/ball.png" class="">
                            <h4 class="text-center">{{$team->name}}</h4></a>
                    </div>
                    @endforeach
                    @else
                    <div class="col-sm-12">
                        <h4>Signing up in progress. Please Check back later</h4>
                    </div>
                @endif


            </div>
        </div>
    </section>
    @endsection
