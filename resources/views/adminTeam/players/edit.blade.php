@extends('adminTeam.layout')
@section('title','Team Edit:Player')
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('teamPlayers')}}"> Players</a></li>
            <li class="breadcrumb-item active">{{$player->fname.' '.$player->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Team Overview</h2>
                <div id="separator"></div>
                @if(session('res') && session('res')=='updated')<div class="center-block alert alert-success">{{session('res')}}</div> @endif
                <div class="row">
                    <div class="col-sm-5">
                        <img src="{{asset('images/team/players/'.$player->player_image)}}" class="img-responsive">
                        <h4>{{$player->fname.' '.$player->lname}}</h4>
                        <ul class="list-unstyled">
                            <li>Position: <span>{{$player->position}}</span></li>
                            <li>Height: <span>{{$player->height}}</span></li>
                            <li>Age: <span>Not available</span></li>
                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <form class="form-horizontal" id="editPlayer" method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="player_image" id="player-image" class="form-control">
                                        <p class="error">@if($errors->has('player_image')) @endif {{$errors->first('player_image')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="row">

                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="player-fname" value="{{$player->fname}}" name="player_firstName" placeholder="first name">
                                        <p class="error">@if($errors->has('player_firstName')) @endif {{$errors->first('player_firstName')}}</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="player-lname" value="{{$player->lname}}" name="player_lastName" placeholder="Last name">
                                        <p class="error">@if($errors->has('player_lastName')) @endif {{$errors->first('player_lastName')}}</p>
                                    </div>
                                </div>

                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Position</label>

                                        <select name="player_position" id="player-position" class="form-control">
                                            <option value="">select one</option>
                                            @foreach($positions as $position)
                                                @if(strtolower($position)==$player->position)
                                                    <option value="{{$player->position}}" selected>{{$player->position}}</option>
                                                @else
                                                    <option value="{{$position}}">{{$position}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                        <p class="error">@if($errors->has('player_position')) @endif {{$errors->first('player_position')}}</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Height</label>
                                        <input type="text" class="form-control" id="player-height" value="{{$player->height}}" name="player_height" placeholder="height">
                                        <p class="error">@if($errors->has('player_height')) @endif {{$errors->first('player_height')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="" class="btn btn-primary register-player">Update</button>
                                    <input type="reset"  hidden >
                                </div>

                            </div>
                        </form>
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