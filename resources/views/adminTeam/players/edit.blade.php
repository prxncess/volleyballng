@extends('adminTeam.layout')
@section('title','Team Edit:Player')
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('overview')}}"> Players</a></li>
            <li class="breadcrumb-item active">{{$player->fname.' '.$player->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Edit player</h2>
                <div id="separator"></div>
            </header>
            @if(session('res') && session('res')=='updated')<div class="center-block alert alert-success">{{session('res')}}</div> @endif
            <div class="row">
                <div class="col-sm-5">
                    <img src="{{asset('images/team/players/'.$player->player_image)}}" class="img-responsive">
                    <h4 class="text-capitalize">{{$player->fname.' '.$player->lname}}</h4>
                    <ul class="list-unstyled">
                        <li><span class="text-capitalize">{{$player->position}}</span></li>
                        <li><span>{{$player->feet.' '.$player->inches}}</span></li>
                        <li><span>{{$player->gender}}</span></li>
                    </ul>
                </div>
                <div class="col-sm-7">
                    <form class="form-horizontal" id="editPlayer" method="post" action="" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{--<div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="player_image" id="player-image" class="form-control">
                                    <p class="error">@if($errors->has('player_image')) @endif {{$errors->first('player_image')}}</p>
                                </div>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control text-capitalize" id="player-fname" value="{{$player->fname}}" name="player_firstName" placeholder="Amina">
                                    <p class="error">@if($errors->has('player_firstName')) @endif {{$errors->first('player_firstName')}}</p>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control text-capitalize" id="player-lname" value="{{$player->lname}}" name="player_lastName" placeholder="Bugaje">
                                    <p class="error">@if($errors->has('player_lastName')) @endif {{$errors->first('player_lastName')}}</p>
                                </div>
                            </div>

                        </div>
                        <div id="yellow-separator"></div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-12">
                              <div><label>Gender</label></div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="player_gender" id="player_gender" value="female" {{($player->gender=='female'?' checked':' ')}}>
                                  Female
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="player_gender" id="player_gender" value="male" {{($player->gender=='male'?' checked':' ')}} >
                                  Male
                                </label>
                              </div>
                                <p class="error">@if($errors->has('player_gender')) @endif {{$errors->first('player_gender')}}</p>
                            </div>
                          </div>
                        </div>

                        <div id="yellow-separator"></div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Image</label>
                                    <input type="file" name="player_image" id="player-image" class="form-control">
                                    <p class="error">@if($errors->has('player_image')) @endif {{$errors->first('player_image')}}</p>
                                </div>
                                <div class="col-xs-6">
                                    <label>Position</label>

                                    <select name="player_position" id="player-position" class="form-control">
                                        <option value="">Select one</option>
                                        @foreach($positions as $position)
                                            @if(strtolower($position)==strtolower($player->position))
                                                <option value="{{$player->position}}" selected>{{$player->position}}</option>
                                            @else
                                                <option value="{{$position}}">{{$position}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <p class="error">@if($errors->has('player_position')) @endif {{$errors->first('player_position')}}</p>
                                </div>

                            </div>
                        </div>
                        <div id="yellow-separator"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Height</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select name="player_height_feet" id="player-height-feet" class="form-control">
                                                <option value="">(feet)</option>
                                                @foreach($feets as $feet)
                                                    @if(strtolower($feet)==strtolower($player->feet))
                                                        <option value="{{$player->feet}}" selected>{{$player->feet}}</option>
                                                    @else
                                                        <option value="{{$feet}}">{{$feet}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                        <div class="col-xs-6">
                                            <select name="player_height_inches" id="player-height-inches" class="form-control">
                                                <option value="">(inches)</option>
                                                @foreach($inches as $inch)
                                                    @if(strtolower($inch)== strtolower($player->inches))
                                                        <option value="{{$player->inches}}" selected>{{$player->inches}}</option>
                                                    @else
                                                        <option value="{{$inch}}">{{$inch}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="" class="btn vb-button register-player">Update</button>
                                <input type="reset"  hidden >
                            </div>

                        </div>
                    </form>
                </div>
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
