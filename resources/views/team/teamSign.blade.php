@extends('layout')
@section('title','Team Login')
@section('content')

        <header id="container">
            <h2>Team sign-in</h2>
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

        <form id="vb-team-login" method="post" action="{{route('teamSignIn')}}" class="form-horizontal">
            <header> <h2 class="text-center"><i  class="fa fa-lock"></i></h2> </header>

            {{csrf_field()}}
            <div class="row">
                <p  class=" text-center error">@if(session('message')) {{session('message')}} @endif</p>
                @if(session('status'))
                    <p class=" alert alert-danger text-center error">
                        {{session('status')}}
                    </p>
                    @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="e.g.volley@gmail.com">
                        <p class="error">@if($errors->has('email')) {{$errors->first('email')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password"  id="password" placeholder="Team password">
                        <p class="error">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                       <button type="submit" id="vb-button" class="btn btn-primary">Login</button>
                </div>
            </div>

        </form>
    </section>

        @endsection
