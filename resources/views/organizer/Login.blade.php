
@extends('layout')
@section('title','Event Login')
@section('content')

<div class="container" id="background">

    <section id="team-login">
      <form id="vb-team-login" class="form-horizontal" action="{{route('organizerLogin')}}" method="post">
          <header><h2 class="text-center"><i class="fa fa-lock"></i></h2>
          <h3 class="text-center">Event Organizer</h3>
              @if(session('res'))
                  <div class="error text-center">{{session('res')}}</div>
                  @elseif(session('status'))
                  <div class="alert alert-success">{!! session('status') !!}</div>
              @endif
          </header>
          {{csrf_field()}}
          <div class="row">
              <div class="col-xs-12 bottom-20 text-center">
                  <input type="email" class="form-control" name="user_name" placeholder="Email address" autofocus>
                  <p class="error">@if($errors->has('user_name')) {{$errors->first('user_name')}}@endif </p>
              </div>
              <div class="col-xs-12 bottom-20 text-center">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <p class="error">@if($errors->has('password')) {{$errors->first('password')}}@endif </p>
              </div>
              <!-- <div class="col-xs-12 form-group">
                  <input type="checkbox" class="right-5" value="remember-me"> Remember me
                  <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
              </div> -->
              <div class="col-xs-12 bottom-20">
                <button id="vb-button" class="btn btn-primary" type="submit">Login</button>
              </div>
          </div>
      </form>
    </section>
</div>
@endsection
