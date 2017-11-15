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
                <h2>Team Overview</h2>
                <div id="separator"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <img src="{{asset('images/team/players/'.$player->player_image)}}" class="img-responsive">
                        <h4>{{$player->fname.' '.$player->lname}}</h4>
                    </div>
                    <div class="col-sm-7">
                        <ul class="list-unstyled">
                            <li>Position: <span>{{$player->position}}</span></li>
                            <li>Height: <span>{{$player->feet.' '.$player->inches}}</span></li>
                            <li>Age: <span>Not available</span></li>
                        </ul>
                        <a href="{{route('updatePlayer',[$player->id])}}" id="editPlayer" class="btn btn-purple bottom-20"><i class="fa fa-edit"></i> Edit </a>
                        <a href="{{route('removePlayer',[$player->id])}}" id="removePlayer" class="btn btn-purple bottom-20"><i class="fa fa-remove"></i> Remove</a>
                    </div>
                </div>
            </header>
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
