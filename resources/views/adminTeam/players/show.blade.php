@extends('adminTeam.layout')
@section('title')
    {!! $team->name.' Player: '.$player->name !!}
    @endsection
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('overview')}}"> Players</a></li>
            <li class="breadcrumb-item active">{{$player->fname.' '.$player->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Player Overview</h2>
                <div id="separator"></div>
            </header>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <img src="{{asset('images/team/players/'.$player->player_image)}}" class="img-responsive">
                  <h4 class="text-capitalize">{{$player->fname.' '.$player->lname}}</h4>

                  <div class="gray-separator top-20 bottom-20"></div>

                  <ul class="list-unstyled">
                      <li><b>Position</b>: <span class="text-capitalize">{{$player->position}}</span></li>
                      <li><b>Height</b>: <span>{{$player->feet.' '.$player->inches}}</span></li>
                      <li><b>Gender</b>: <span>{{$player->gender}}</span></li>
                  </ul>

                  <div class="gray-separator top-20 bottom-20"></div>
                    <button class="btn btn-purple bottom-20 right-10"><i class="fa fa-print"></i> Player Slip </button>
                  <a href="{{route('updatePlayer',[$player->id])}}" id="editPlayer" class="btn btn-purple bottom-20 right-10"><i class="fa fa-edit"></i> Edit </a>
                  <a href="{{route('removePlayer',[$player->id])}}" id="removePlayer" class="btn btn-purple bottom-20"><i class="fa fa-remove"></i> Remove</a>
                </div>
                <div class="col-sm-3"></div>
                <!-- <div class="col-sm-5">
                </div>
                <div class="col-sm-7">
                </div> -->
            </div>
        </div>

    </section>

@endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removePlayer').on('click',function(){
                if(confirm('Remove this player?')==false){
                    return false;
                }
            })
        })
    </script>
@endsection
