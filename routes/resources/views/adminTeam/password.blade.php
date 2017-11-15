@extends('adminTeam.layout')
@section('title')
    {{'change password'}}
    @endsection
@section('content')
    <section id="updatePassword">
        <div id="admin-box" class="well well">
            <header>
                <h3>Change Password</h3>
                <div id="separator"></div>
                @if(session('res')) <div class="alert alert-success alert-dismissable">{{session('res')}}</div> @endif
            </header>
            <form method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Password</label>
                            <input type="password" class="form-control"  title="password" id="team-password" name="password">
                            <p class="error">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Password Confirm</label>
                            <input type="password" class="form-control" title="confirm password"  id="password-confirm" name="password_confirmation">
                            <p class="error">@if($errors->has('password_confirmation')) {{$errors->first('password_confirmation')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    @endsection