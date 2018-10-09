@extends('layout')
@section('title','Team Password Rest')
@section('content')

    <header id="container">
        <h2>Password reset</h2>
        <div id="yellow-separator"></div>
    </header>

    <div id="events-subnav">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{route('viewTeams')}}" class="top-bottom-padding-20">Teams</a>
            </div>
            <div class="col-sm-4">
                <a href="{{route('register')}}" class="top-bottom-padding-20">Register a team</a>
            </div>
            <div class="col-sm-4">
                <a href="{{route('teamSignIn')}}" class="active top-bottom-padding-20">Team Login</a>
            </div>

        </div>
    </div>

    <section id="team-login">

        <form id="vb-team-login" method="post"  class="form-horizontal">
            <header class="top-20"> <h3 class="text-center">Reset Password</h3> </header>

            {{csrf_field()}}
            <div class="row">
                @if(session('status'))
                    <p class=" alert alert-success text-center ">
                        {!! session('status') !!}
                    </p>
                @endif
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="contact" value="{{old('contact')}}" id="email" placeholder="Team email">
                        <p class="error">@if($errors->has('contact')) {{$errors->first('contact')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="email" placeholder="New Password">
                        <p class="error">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password_confirmation" value="" id="email" placeholder="Password Confirm">
                        <p class="error">@if($errors->has('password_confirmation')) {{$errors->first('password_confirmation')}} @endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="vb-button" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
