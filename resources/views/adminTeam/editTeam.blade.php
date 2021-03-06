@extends('adminTeam.layout')
@section('title')
    {{'Update team information'}}
@endsection
@section('content')
    <section id="upTeamInfo">
        <div class="well well" id="admin-box">
            <form class="form-horizontal" method="post"   enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                <div class="">
                    <div class="text-center top-20" id="team-logo">
                        <img src="{!! asset('images/ball.png') !!}" id="show-logo-img">
                        <p><button type="button" class="btn btn-purple" >
                            Update logo
                        </button><p>
                        {{--<l class="fa fa-plus"></l>--}}
                        <input type="file" name="logo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error">@if($errors->has('logo')) {{$errors->first('logo')}} @endif</p>
                    </div>
                    <div class="form-group top-40">
                        <div class="col-sm-12">
                            <label>Team name</label>
                            <input type="text" class="form-control text-capitalize" disabled value="{{$team->name}}" id="team-name" name="teamName" PLACEHOLDER="the uyo checkers">

                        </div>
                    </div>
                    <div class="gray-separator top-20 bottom-20"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Email address</label>
                            <input type="text" class="form-control" value="{{$team->contact}}" id="team-contact" name="teamContact" PLACEHOLDER="tuc@volleyball.ng">
                            <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}} @endif</p>
                        </div>
                    </div>
                    <div class="gray-separator top-20 bottom-20"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="number" class="form-control" value="{{$team->phone}}" id="team-phone" name="teamPhone" PLACEHOLDER="08021234567">
                            <p class="error">@if($errors->has('teamPhone')) {{$errors->first('teamPhone')}} @endif</p>
                        </div>
                    </div>
                    <div class="gray-separator top-20 bottom-20"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                          <label>Contact person</label>
                          <input type="text" class="form-control" name="contactPerson" id="contact-person" value="{{$team->contact_person}}" placeholder="Ifiok">
                          <p class="error">@if($errors->has('contactPerson')) {{$errors->first('contactPerson')}}@endif</p>
                        </div>
                    </div>
                    <div class="gray-separator top-20 bottom-20"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control" name="teamDescription">{{$team->description}}</textarea>
                            <p class="error">@if($errors->has('teamDescription')) {{$errors->first('teamDescription')}} @endif</p>
                        </div>
                    </div>
                    <div class="gray-separator top-20 bottom-20"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Team image</label>
                            <p>
                              <i class="right-5">Upload a group image of your entire team</i>
                              <a class="fa fa-info-circle" data-toggle="tooltip" data-html="true" data-placement="top" title="<p>Size: less than 2mb;</p> <p>Accepted formats: jpg, jpeg, png;</p> <p>Tip: Your photo should clearly show all members of your team, and should have a plain background if possible.</p>"></a>
                            <p>
                            <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                            <p class="error">@if($errors->has('team_image')) {{$errors->first('team_image')}} @endif</p>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn vb-button">Update</button>
                        </div>
                    </div>
                </div>
              </fieldset>
            </form>
        </div>
    </section>
@endsection
@section('footer-scripts')
    <script type="text/javascript">
        //member-img
        $('div#team-logo button').on('click',function(){
            $('#logo').click();
        })
        // tooltip
        $('[data-toggle="tooltip"]').tooltip();
        $('#logo').on('change',function(e){
            showfile(this,'div#team-logo img#show-logo-img')
        })
        function showfile(fileInput,img,showName){
            if(fileInput.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $(img).attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
                $(showName).text(fileInput.files[0].name);
            }
        }
    </script>
    @endsection
