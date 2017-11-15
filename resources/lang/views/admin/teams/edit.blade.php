@extends('admin.layout')
@section('title')
    {{'Volleyball.ng Update '.$team->name}}
    @endsection

@section('content')
    <section id="vb-team-edit">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('allTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item active">{{$team->name}}</li>
        </ol>
        <div class="well well" id="admin-box">

            <header>
                <h2>Team {{$team->name}}</h2>
                <div id="separator"></div>
                @if(session('res')) <div class="alert alert-success alert-dismissable">{{session('res')}}</div> @endif
            </header>

            <form class="form-horizontal" method="post" >
                {{csrf_field()}}
                <div class="">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Name</label>
                            <input type="text" class="form-control text-capitalize" value="{{$team->name}}" id="team-name" name="teamName" PLACEHOLDER="damaturu ballers">
                            <p class="error">@if($errors->has('teamName')) {{$errors->first('teamName')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Contact</label>
                            <input type="text" class="form-control" value="{{$team->contact}}" id="team-contact" name="teamContact" PLACEHOLDER="db@gmail.com">
                            <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{$team->phone}}" id="team-phone" name="teamPhone" PLACEHOLDER="08021234567">
                            <p class="error">@if($errors->has('teamPhone')) {{$errors->first('teamPhone')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control" name="teamDescription">{{$team->description}}</textarea>
                            <p class="error">@if($errors->has('teamDescription')) {{$errors->first('teamDescription')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Password</label>
                            <input type="password" class="form-control"  id="team-password" name="password">
                            <p class="error">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Confirm password</label>
                            <input type="password" class="form-control"  id="password-confirm" name="password_confirmation">
                            <p class="error">@if($errors->has('password_confirmation')) {{$errors->first('password_confirmation')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn vb-button">Update</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>


    @endsection
