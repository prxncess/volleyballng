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

            <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="">
                    <div class="text-center top-20" id="team-logo">
                        @if($team->logo ==null)
                            <img src="{{asset('images/ball.png')}}" id="show-logo-img">
                        @else
                            <img src="{{asset('images/team/'.$team->logo)}}" id="show-logo-img">
                        @endif
                        <p><button type="button" class="btn btn-purple" >
                                Update logo
                            </button><p>
                            {{--<l class="fa fa-plus"></l>--}}
                            <input type="file" name="teamLogo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error">@if($errors->has('teamLogo')) {{$errors->first('teamLogo')}} @endif</p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Name</label>
                            <input type="text" class="form-control text-capitalize" value="{{$team->name}}" id="team-name" name="teamName" PLACEHOLDER="damaturu ballers">
                            <p class="error">@if($errors->has('teamName')) {{$errors->first('teamName')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Email address</label>
                            <input type="text" class="form-control" value="{{$team->contact}}" id="team-contact" name="teamContact" PLACEHOLDER="db@gmail.com">
                            <p class="error">@if($errors->has('teamContact')) {{$errors->first('teamContact')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="number" class="form-control" value="{{$team->phone}}" id="team-phone" name="teamPhone" PLACEHOLDER="08021234567">
                            <p class="error">@if($errors->has('teamPhone')) {{$errors->first('teamPhone')}} @endif</p>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label>Contact person</label>
                        <input type="text" class="form-control" name="contactPerson" id="contact-person" value="{{$team->contact_person}}" placeholder="Ahmad">
                        <p class="error">@if($errors->has('contactPerson')) {{$errors->first('contactPerson')}}@endif</p>
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
@section('footer-scripts')
    <script type="text/javascript">
        //team logo
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

