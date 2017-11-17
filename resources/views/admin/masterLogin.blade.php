<!-- <!DOCTYPE html>
<html lang="en"> -->
@extends('layout')
@section('title','Admin Login')
@section('content')

<!-- <body class="login-img3-body"> -->

<div class="container" id="background">

    <section id="team-login">
      <form id="vb-team-login" class="form-horizontal" action="{{route('MasterLogin')}}" method="post">
          <header><h2 class="text-center"><i class="fa fa-lock"></i></h2> </header>
          {{csrf_field()}}
          <div class="row">
              <div class="col-xs-12 bottom-20 text-center error">
                  <input type="text" class="form-control" name="user_name" placeholder="Username" autofocus>
              </div>
              <div class="col-xs-12 bottom-20 text-center error">
                  <input type="password" class="form-control" name="passkey" placeholder="Password">
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
    <!-- <div class="text-right">
        <div class="credits">
           </div>
    </div> -->
</div>


<!-- </body>
</html> -->
