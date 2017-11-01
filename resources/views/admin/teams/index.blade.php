@extends('admin.layout')
@section('title','All Teams- volleyBall.ng')
@section('content')

    <section id="allTeams">
        <div class="well well" id="admin-box">
            <header>
                <h3>Teams</h3>
                <a href="{{route('addTeam')}}" class="pull-right"><i class="fa fa-plus"></i> New team</a>
                <div id="separator"></div>
            </header>
            @if($teams->isNotEmpty())
                {{--display all teams--}}
                <div class="row" id="team">
                    @foreach($teams as $team)
                        <div class="col-md-6 co-xs-12 col-lg-6 col-sm-6">
                            <a href="{{route('viewTeam',$team->name)}}">
                            <img src="{{asset('images/ball.png')}}">
                            <h4 class="text-center text-capitalize">{{$team->name}} </h4>
                            </a>
                        </div>
                        @endforeach
                </div>
                @else
                {{--no teams yet--}}
                <div class="alert alert-warning alert-dismissable">There currently no teams at the moment</div>
            @endif
        </div>
    </section>
    @endsection