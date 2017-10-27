@extends('admin.layout')
@section('title','Create Team- volleyball.ng')
@section('content')
    <section id="ad-vd-addTeam">

        <div class="well well" id="admin-box">
            <header>
                <h2>Add Team</h2>
                <div class="" id="separator"></div>
            </header>
            <form method="post" class="form-horizontal" id="add-team">
                {{csrf_field()}}
                <fieldset class="">
                    <div class="form-group">
                        <label>Name of team</label>
                        <input type="text" class="form-control text-capitalize" name="teamName" value="{{old('teamName')}}" id="team-name" placeholder="Team name">
                        <p class="error">@if($errors->has('teamName')) {{$errors->first('teamName')}}@endif </p>
                    </div>
                    <!-- <div id="separator"></div> -->
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" name="teamContact" value="{{old('teamContact')}}" id="team-contact" placeholder="email">
                        <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}}@endif</p>
                    </div>
                    <!-- <div id="separator"></div> -->
                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="teamPhoneNumber" value="{{old('teamPhoneNumber')}}" id="team-phone" placeholder="Phone number">
                        <p class="error">@if($errors->has('teamPhoneNumber')) {{$errors->first('teamPhoneNumber')}}@endif</p>
                    </div>
                </fieldset>
                <div class="gray-separator bottom-20"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" id="vb-button" class="btn btn-primary" value="">Create team</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @endsection
