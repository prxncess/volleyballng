@extends('organizer.layout')
@section('title')
    {{$player->fname." ".$player->lname.' Overview'}}
    @endsection

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url()->previous()}}">{{$team[0]->name}}</a> </li>
        <li class="breadcrumb-item-active">{{$player->fname.' '.$player->lname}}</li>
    </ol>
    <div id="admin-box" class="well well">

        <header>
            <h2>Player Card</h2>
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
                 </div>
            <div class="col-sm-3"></div>
            <!-- <div class="col-sm-5">
            </div>
            <div class="col-sm-7">
            </div> -->
        </div>
    </div>
    @endsection
