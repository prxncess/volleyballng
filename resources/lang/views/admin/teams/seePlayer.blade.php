@extends('admin.layout')
@section('title','Team Overview:Player')
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('allTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item"> <a href="{{route('viewTeam',$team->name)}}">{{$team->name}}</a> </li>
            <li class="breadcrumb-item active">{{$player->fname.''.$player->lname}}</li>
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
                            <li>Height: <span>{{$player->height}}</span></li>
                            <li>Age: <span>Not available</span></li>
                        </ul>
                        <a href="{{route('editPlayer',[$team->name,$player->id])}}" id="editPlayer" class="btn btn-warning"><i class="fa fa-edit"></i> Edit </a>
                        <a href="{{route('deletePlayer',[$team->name,$player->id])}}" id="removePlayer" class="btn btn-danger"><i class="fa fa-remove"></i> Remove</a>
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
                if(confirm('Are you sure you want to remove this player ')==false){
                    return false;
                }
            })
        })
    </script>
    @endsection