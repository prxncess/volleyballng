@extends('layout')
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
                <a href="{{route('register')}}" class="top-bottom-padding-20">Register a team</a>
              </div>
              <div class="col-sm-4">
                <a href="{{route('teamSignIn')}}" class="top-bottom-padding-20">Team Login</a>
              </div>
            </div>
        </div>

        <div id="vb-teams" class="container">
            <div class="row">

                @if(!empty($teams))
                    @php
                    $count=0;
                     @endphp
                    @foreach($teams as $team)
                        @if($count%4==0)
                            <div class="row">
                                <div id="vb-team" class="col-xs-6 col-sm-3 col-md-3">
                                <a href="{{route('seeTeam',$team->name)}}">
                                    @if($team->logo==null)
                                        <img src="{{asset('images/ball.png')}}" class="img-responsive">
                                    @else
                                        <img src="{{asset('images/team/'.$team->logo)}}" class="img-responsive">
                                    @endif
                                    <h4 class="text-center">{{$team->name}}</h4></a>
                            </div>
                            @else
                            <div id="vb-team" class="col-xs-6 col-sm-3 col-md-3">
                                <a href="{{route('seeTeam',$team->name)}}">
                                    @if($team->logo==null)
                                        <img src="{{asset('images/ball.png')}}" class="img-responsive">
                                    @else
                                        <img src="{{asset('images/team/'.$team->logo)}}" class="img-responsive">
                                    @endif
                                    <h4 class="text-center">{{$team->name}}</h4></a>
                            </div>{{--@if($count%4==0)</div> @endif--}}
                            @endif
                @php
                $count++
                @endphp
                    @endforeach
                    @else
                    <div class="col-sm-12">
                        <h4>Signing up in progress. Please check your email for login details</h4>
                    </div>
                @endif

            </div>
        </div>
    </section>
    @endsection
