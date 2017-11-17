@extends('layout')
@section('title','Create Team')
@section('extra-style')
    <style>
        form#proForm{
            max-width: 500px;
            margin: 50px auto;
            position: relative;
            /*box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);
            webkit-box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);* 199.167.147.38#default server ip gigalayer/
            background: white;
        }
        form#proForm fieldset{
            /*position: absolute;*/
            padding: 20px;
        }
        fieldset:not(:first-of-type){
            display: none;
        }
        header h2{
            color: orangered;
        }
        ul.progressive-bar{
            overflow: hidden;
            counter-reset: step;
            margin-bottom: 30px;
            max-width: 500px;

        }
        ul.progressive-bar li{
            list-style-type: none;
            float: left;
            width: 25%;
            position: relative;
            text-align: center;
        }
        ul.progressive-bar li:before{
            content: counter(step);
            counter-increment: step;
            display: block;
            width: 20px;
            border-radius: 2px;
            background: white;
            border: 1px solid #E8B617;
            margin: 0 auto 5px auto;
            line-height: 20px;
        }
        ul.progressive-bar li:after{
            position: absolute;
            content: '';
            height: 2px;
            background: gray;
            z-index: -1;
            width: 100%;
            top: 9px;
            left: -50%;

        }
        ul.progressive-bar li:first-child:after{
            content: none;
        }
        ul.progressive-bar li.active:before , ul.progressive-bar li.active:after{
            background: #E8B617;
            color: white;
        }
    </style>
@endsection
@section('content')

    <section id="register-team">
        <header>
            <h2>Team registration</h2>
            <div id="yellow-separator"></div>
            {{--<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
                <li class="breadcrumb-item active">Team Registration</li>
            </ol>--}}
            <div id="events-subnav">
              <div class="row">
                <div class="col-sm-4">
                  <a href="{{route('viewTeams')}}" class="top-bottom-padding-20">Teams</a>
                </div>
                <div class="col-sm-4">
                  <a href="{{route('register')}}" class="active top-bottom-padding-20">Register a team</a>
                </div>
                <div class="col-sm-4">
                  <a href="{{route('teamSignIn')}}" class="top-bottom-padding-20">Team Login</a>
                </div>
              </div>
            </div>
        </header>

        </ul>
        <form method="post" id="proForm"  class=" center-block add-team" enctype="multipart/form-data">
            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="teamindex" id="teamindex" value="">

            <fieldset id="team-info">
                <div class="" id="team-logo">
                    <img src="{!! asset('images/ball.png') !!}" id="show-logo-img">
                    <button type="button" class="top-20">
                        Upload logo
                    </button>
                    {{--<l class="fa fa-plus"></l>--}}
                    <input type="file" name="logo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                    <p class="error">@if($errors->has('logo')) {{$errors->first('logo')}} @endif</p>
                </div>
                <div class="form-group top-40">
                    <label>Name of team</label>
                    <input type="text" class="form-control text-capitalize" value="{{old('team-name')}}" name="team-name" id="team-name" placeholder="the bears">
                    <p class="error">@if($errors->has('team-name')) {{$errors->first('team-name')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="team-contact" value="{{old('team-contact')}}" id="team-contact" placeholder="thebears@gmail.com">
                    <p class="error">@if($errors->has('team-contact')) {{$errors->first('team-contact')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input type="number" class="form-control" name="team-phone" id="team-phone" value="{{old('team-phone')}}" placeholder="08021234567">
                    <p class="error">@if($errors->has('team-phone')) {{$errors->first('team-phone')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Contact person</label>
                    <input type="text" class="form-control" name="contact-person" id="contact-person" value="{{old('contact-person')}}" placeholder="Clara">
                    <p class="error">@if($errors->has('contact-person')) {{$errors->first('contact-person')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Team image</label>
                    <p>
                      <i class="right-5">Upload a group image of your entire team</i>
                      <a class="fa fa-info-circle" data-toggle="tooltip" data-html="true" data-placement="top" title="<p>Size: less than 2mb;</p> <p>Accepted formats: jpg, jpeg, png;</p> <p>Tip: Your photo should clearly show all members of your team, and should have a plain background if possible.</p>"></a>
                    <p>
                    <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                    <p class="error">@if($errors->has('team_image')) {{$errors->first('team_image')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <article>
                    <header><h3>Terms & Conditions</h3></header>
                    <p>You agree that you have the right to post any team information you like, and that such content, or its use by us as contemplated by this text, does not violate this agreement, applicable law, or the intellectual property rights of others.
                        Your information will not be sold or revealed to third parties, but you grant us license to use this information on or in connection with Volleyball.ng and related activities.
                        This agreement lasts until you request the termination of your Volleyball.ng user account, except in the case of content that you have published, made public and/or shared with others.
                        Aside from the rights specifically granted herein, you retain ownership of all rights, including intellectual property rights, in the content that you post to Volleyball.ng </p>
                    <div id="yellow-separator"></div>
                    <div id="agree">
                        <aside>
                            <input type="checkbox" name="accept"  id="terms" class="right-10" >We agree
                            <p class="error">@if($errors->has('accept')) {{$errors->first('accept')}}@endif</p>
                        </aside>

                    </div>
                </article >

            </fieldset>

            <button type="submit"  value="teamInfo" id="vb-button" class="btn btn-default">Register</button>
        </form>


    </section>

    {{--modal--}}
@endsection


@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add-more').on('click',function(event){
                $('div#add-player').modal();
                if ($(".modal-backdrop").length > 1) {
                    $(".modal-backdrop").not(':last').remove();
                }
            })
            // tooltip
            $('[data-toggle="tooltip"]').tooltip();
            //fade message after 10 seconds
            $('#proForm div#res').fadeOut(10000)
            //close modal
            $('.close').on('click',function(){
                $('div#add-player').modal('hide')
                $('body').removeClass().removeAttr('style').removeAttr('class');
                $('.modal-backdrop').remove();
            })
            $('.modal-backdrop').on('click',function(){$('.modal-backdrop').remove()})
            $('body.modal-backdrop').on('click',function(){
                $('.modal-backdrop').remove();
            });
            //team logo
            $('div#team-logo button').on('click',function(){
                $('#logo').click();
            })
            $('#logo').on('change',function(e){
                showfile(this,'div#team-logo img#show-logo-img')
            })
            //member-img

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
            function nextField(fieldset,alert){
                current_fs=$(fieldset).parent();
                next_fs=$(fieldset).parent().next()
                //add alert to field

                next_fs.find('h4').before(alert);
                //progressbar
                $('.progressive-bar li').eq($('fieldset').index(next_fs)).addClass('active')
                //display next fieldset
                next_fs.show();
                //hide current fieldset
                current_fs.hide();
            }

            /*$('form#proForm').on('submit',function(e){
                e.preventDefault();
                $('#team-name').parent().find('p').html(' ')
                $('#team-contact').parent().find('p').html(' ')
                $('#team-phone').parent().find('p').html(' ')
                $('#team-img').parent().find('p').html(' ')
                $('#logo').parent().find('p').html(' ')
                $('#terms').parent().find('p').html(' ')
                //get all values
                var teamData= new FormData();
                var teamLogo=$('#logo')[0].files[0];
                var teamImage=$('#team-img')[0].files[0];
                teamData.append('teamName',$('#team-name').val());
                teamData.append('teamContact',$('#team-contact').val());
                teamData.append('teamPhoneNumber',$('#team-phone').val());
                teamData.append('terms',$('#terms').val());
                teamData.append('teamLogo',teamLogo);
                teamData.append('teamImage',teamImage);
                teamData.append('_token',$('#token').val())
                $.ajax({
                    url:"{{route("TeamInfo")}}",
                    type:"POST",
                    data:teamData,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        if(data.status=='error'){
                            // display errors
                            var message= data.errors;
                            //display error

                            if(message.teamName === undefined ? null:$('#team-name').parent().find('p').html(''+message.teamName[0]));
                            if(message.teamContact === undefined ? null:$('#team-contact').parent().find('p').html(''+message.teamContact[0]));
                            if(message.teamPhoneNumber === undefined ? null:$('#team-phone').parent().find('p').html(''+message.teamPhoneNumber[0]));
                            if(message.teamLogo === undefined ? null:$('#logo').parent().find('p').html(''+message.teamLogo[0]));
                            if(message.teamImage === undefined ? null:$('#team-img').parent().find('p').html(''+message.teamImage[0]));


                        }else if(data.status=='saved'){

                            {{ redirect()->route('teamSignIn')->with('status','Your account has been created, please check your registered email for login details')}}

                        }
                    }

                })

            })*/


        })
    </script>
@endsection
