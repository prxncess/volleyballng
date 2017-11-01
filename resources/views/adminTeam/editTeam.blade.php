@extends('adminTeam.layout')
@section('title')
    {{'Update team information'}}
@endsection
@section('content')
    <section id="upTeamInfo">
        <div class="well well" id="admin-box">
            <form class="form-horizontal" method="post"   enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="">
                    <div class="" id="team-logo">
                        <img src="{!! asset('images/ball.png') !!}" id="show-logo-img">
                        <button type="button" class="btn-purple" >
                            upload logo
                        </button>
                        {{--<l class="fa fa-plus"></l>--}}
                        <input type="file" name="logo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error">@if($errors->has('logo')) {{$errors->first('logo')}} @endif</p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Name</label>
                            <input type="text" class="form-control" disabled value="{{$team->name}}" id="team-name" name="teamName" PLACEHOLDER="Team Name">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Contact</label>
                            <input type="text" class="form-control" value="{{$team->contact}}" id="team-contact" name="teamContact" PLACEHOLDER="Team Email">
                            <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{$team->phone}}" id="team-phone" name="teamPhone" PLACEHOLDER="team mobile Number">
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
                            <label>Team image</label>
                            <i>Please upload a group image of your entire team</i>
                            <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                            <p class="error">@if($errors->has('team_image')) {{$errors->first('team_image')}} @endif</p>
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
@section('footer-scripts')
    <script type="text/javascript">
        //member-img
        $('div#team-logo button').on('click',function(){
            $('#logo').click();
        })
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
