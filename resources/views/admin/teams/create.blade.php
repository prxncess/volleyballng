@extends('admin.layout')
@section('title','Create Team- volleyball.ng')
@section('content')
    <section id="ad-vd-addTeam">

        <div class="well well" id="admin-box">
            <header>
                <h2>Add Team</h2>
                <div class="gray-separator bottom-40"></div>
            </header>
            <form method="post" class="form-horizontal" id="add-team">
                {{csrf_field()}}
                <fieldset class="">
                    <div class="form-group">
                        <label>Name of team</label>
                        <input type="text" class="form-control text-capitalize" name="teamName" value="{{old('teamName')}}" id="team-name" placeholder="Pace setters">
                        <p class="error">@if($errors->has('teamName')) {{$errors->first('teamName')}}@endif </p>
                    </div>
                    <!-- <div id="separator"></div> -->
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" name="teamContact" value="{{old('teamContact')}}" id="team-contact" placeholder="e.g. pacesetters@gmail.com">
                        <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}}@endif</p>
                    </div>
                    <!-- <div id="separator"></div> -->
                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="number" class="form-control" name="teamPhoneNumber" value="{{old('teamPhoneNumber')}}" id="team-phone" placeholder="08021234567">
                        <p class="error">@if($errors->has('teamPhoneNumber')) {{$errors->first('teamPhoneNumber')}}@endif</p>
                    </div>
                    <!-- <div id="yellow-separator"></div> -->
                    <div class="form-group">
                        <label>Contact person</label>
                        <input type="text" class="form-control" name="contactPerson" id="contact-person" value="{{old('contactPerson')}}" placeholder="Uwa">
                        <p class="error">@if($errors->has('contactPerson')) {{$errors->first('contactPerson')}}@endif</p>
                    </div>

                    <!-- <div id="yellow-separator"></div> -->

                    <div class="form-group">
                      <label>Description</label>
                      <p>A brief history/introduction of this team, e.g. when it started and other interesting things.</p>
                      <textarea class="form-control" name="teamDescription" id="" rows="3" value="{{old('teamDescription')}}" placeholder="">{{old('teamDescription')}}</textarea>
                    </div>

                    <!-- <div id="yellow-separator"></div> -->

                </fieldset>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="vb-button" class="btn btn-primary" value="">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @endsection
