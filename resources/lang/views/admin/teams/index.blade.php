@extends('admin.layout')
@section('title','All Teams- volleyBall.ng')
@section('content')

    <section id="allTeams">
        <div class="well well" id="admin-box">
            <header>
                <h3>Teams</h3>
                <div id="separator"></div>
                <a href="{{route('addTeam')}}" class="float-right btn btn-purple top-10 bottom-10"><i class="fa fa-plus right-5"></i> New team</a>
            </header>
            @if($teams->isNotEmpty())
                {{--display all teams--}}
                <div class="row top-20" id="team">
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
                <div class="alert alert-warning alert-dismissable">No teams yet - click the 'New team' button to get started</div>
            @endif
        </div>
    </section>
    @endsection