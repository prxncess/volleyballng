@extends('admin.layout')
@section('title','All Teams- volleyBall.ng')
@section('content')

    <section id="allTeams">
        <div class="well well" id="admin-box">
            <header>
                <h3>Teams</h3>
                <div id="separator"></div>
                @if(session('res'))
                    <div class="alert alert-success">{{session('res')}}</div>
                @endif
                <a href="{{route('addTeam')}}" class=" btn btn-purple "><i class="fa fa-plus right-5"></i> New team</a>
            </header>

            @if($teams->isNotEmpty())
                @php
                $i=0
                @endphp
                {{--display all teams--}}
               {{-- <div class="row" id="team">--}}
                    @foreach($teams as $team)
                        @if($i%2==0)
                        <div class="row top-20" id="team"> <div class="col-md-6 co-xs-12 col-lg-6 col-sm-6">
                                <a href="{{route('viewTeam',$team->name)}}">
                                    <img src="{{asset('images/ball.png')}}">
                                    <h4 class="text-center text-capitalize">{{$team->name}} </h4>
                                </a>
                            </div>
                            @else
                                <div class="col-md-6 co-xs-12 col-lg-6 col-sm-6">
                                    <a href="{{route('viewTeam',$team->name)}}">
                                        <img src="{{asset('images/ball.png')}}">
                                        <h4 class="text-center text-capitalize">{{$team->name}} </h4>
                                    </a>
                                </div> </div>
                            @endif

                            @php
                            $i++
                            @endphp
                        @endforeach

                @else
                {{--no teams yet--}}
                <div class="alert alert-warning alert-dismissable">No teams yet - click the 'New team' button to get started</div>
            @endif
            <div class="center-block">
                {{$teams->links()}}

            </div>
        </div>
    </section>
    @endsection
