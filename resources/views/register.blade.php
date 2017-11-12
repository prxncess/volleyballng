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
                <a href="{{route('viewTeams')}}">Teams</a>
                <a href="{{route('register')}}" class="active">Register a team</a>
                <a href="{{route('teamSignIn')}}">Team Login</a>
            </div>
        </header>

        </ul>
        <form method="post" id="proForm"  class=" center-block add-team" enctype="multipart/form-data">
            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="teamindex" id="teamindex" value="">

            <fieldset id="team-info">
                <div class="" id="team-logo">
                    <img src="{!! asset('images/ball.png') !!}" id="show-logo-img">
                    <button type="button" >
                        upload logo
                    </button>
                    {{--<l class="fa fa-plus"></l>--}}
                    <input type="file" name="logo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                    <p class="error">@if($errors->has('logo')) {{$errors->first('logo')}} @endif</p>
                </div>
                <div class="form-group">
                    <label>Name of team</label>
                    <input type="text" class="form-control text-capitalize" value="{{old('team-name')}}" name="team-name" id="team-name" placeholder="Team name">
                    <p class="error">@if($errors->has('team-name')) {{$errors->first('team-name')}}@endif</p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="team-contact" value="{{old('team-contact')}}" id="team-contact" placeholder="email">
                    <p class="error">@if($errors->has('team-contact')) {{$errors->first('team-contact')}}@endif</p>
                </div><div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input type="text" class="form-control" name="team-phone" id="team-phone" value="{{old('team-phone')}}" placeholder="Phone number">
                    <p class="error">@if($errors->has('team-phone')) {{$errors->first('team-phone')}}@endif</p>
                </div><div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Team image</label>
                    <i>Please upload a group image of your entire team</i>
                    <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                    <p class="error">@if($errors->has('team_image')) {{$errors->first('team_image')}}@endif</p>
                </div><div id="yellow-separator"></div>
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

                            {{ redirect()->route('teamSignIn')->with('status','Congratulation Your account has being created. <p>Please Check you mailbox for your password to login</p>')}}

                        }
                    }

                })

            })*/


        })
    </script>
@endsection

