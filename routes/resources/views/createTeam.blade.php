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
        <ul class="progressive-bar center-block">
            <li class="active">Team info</li>
            <li>Coach</li>
            <li>Manager</li>
            <li>Players</li>

        </ul>
        <form method="post" id="proForm" action="{{route('teamCompleted')}}" class=" center-block add-team" enctype="multipart/form-data">
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
                    <p class="error"></p>
                </div>
                <div class="form-group">
                    <label>Name of team</label>
                    <input type="text" class="form-control" name="team-name" id="team-name" placeholder="Team name">
                    <p class="error"></p>
                </div>
                <div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="team-contact" id="team-contact" placeholder="email">
                    <p class="error"></p>
                </div><div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input type="text" class="form-control" name="team-phone" id="team-phone" placeholder="Phone number">
                    <p class="error"></p>
                </div><div id="yellow-separator"></div>
                <div class="form-group">
                    <label>Team image</label>
                    <i>Please upload a group image of your entire team</i>
                    <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                    <p class="error"></p>
                </div><div id="yellow-separator"></div>
                <article>
                    <header><h3>Terms & Conditions</h3></header>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.
                        Ergo hoc quidem apparet, nos ad agendum esse natos.
                        Quid enim de amicitia statueris utilitatis causa expetenda vides.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque eos id agere,
                        ut a se dolores, morbos, debilitates repellant. Ergo hoc quidem apparet,
                        nos ad agendum esse natos.
                        Quid enim de amicitia statueris utilitatis causa expetenda vides. </p>
                    <div id="yellow-separator"></div>
                    <div id="agree">
                        <aside>
                            <input type="checkbox" name="accept" id="terms" class="" >We agree
                        </aside>
                        <p class="error"></p>
                    </div>
                </article >
                <button type="button"  value="teamInfo" class="next btn btn-default">Save & Continue</button>
            </fieldset>

            <fieldset>

                <h4>Add Coach</h4>
                <div id="add-player">
                    <div id="member-info">
                        <div class="" id="coach-img">
                            <img src="{!! asset('images/user.jpg') !!}" id="show-coach-img">
                            <button type="button" >
                                upload image
                            </button>
                            {{--<l class="fa fa-plus"></l>--}}
                            <input type="file" name="coach-photo" id="coach-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                            <p class="error"></p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="coach-fname" name="coach-fname" placeholder="first name">
                                    <p class="error"></p>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="coach-lname" name="coach-lname" placeholder="Last name">
                                    <p class="error"></p>
                                </div>
                            </div>

                        </div>

                        <div id="yellow-separator"></div>
                    </div>
                </div>
                <button type="button" class="prev btn btn-default">Previous</button>
                <button type="button" value="teamCoach" class="next btn btn-default">Save & Continue</button>
            </fieldset>
            <fieldset>
                <div id="res"></div>
                <h4> Add Manager</h4>

                <div id="add-player">

                    <div id="member-info">
                        <div class="" id="manager-img">
                            <img src="{!! asset('images/user.jpg') !!}" id="show-img">
                            <button type="button" >
                                upload image
                            </button>
                            {{--<l class="fa fa-plus"></l>--}}
                            <input type="file" name="manager_photo" id="manager-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                            <p class="error"></p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="manager-fname" name="manager-fname" placeholder=" Manager's first name">
                                    <p class="error"></p>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="manager-lname" name="manager-lname" placeholder=" Manager's Last name">
                                    <p class="error"></p>
                                </div>
                            </div>

                        </div>
                        <div id="yellow-separator"></div>

                    </div>
                </div>

                <button type="button" value="managerInfo" class="next btn btn-default">Save & Continue</button>
            </fieldset>

            <fieldset>
                <div id="res"></div>
                <h4>Add Players</h4>
                <div id="team-data" class="row">
                    <div class=" col-xs-6 col-sm-6 col-md-6"> <div id="added-member">
                            <div class="" id="vb-player-preview">
                                <p>Their currently no players. Please add a player</p>
                            </div>
                        </div></div>
                    <div class=" col-xs-6 col-sm-6 col-md-6"> <div id="team-member"><i id="add-more" class="fa fa-plus"></i></div></div>



                </div>

                <button type="submit" class="submit btn btn-default">save</button>

            </fieldset>
        </form>


    </section>

    {{--modal--}}
    <div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-player" tabindex="1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-body">
                    <div class="row"></div>
                    <form method="post" id="member-info" action="" class="playerForm">
                        <input type="hidden" name="index" id="index" value="">
                       <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <div class="" id="player-img">
                            <img src="{!! asset('images/user.jpg') !!}" id="show-player-img">
                            <button type="button" >
                                upload image
                            </button>

                            <input type="file" name="player_image" id="player-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                            <p class="error"></p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="player-fname" name="player_firstName" placeholder="first name">
                                    <p class="error"></p>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="player-lname" name="player_lastName" placeholder="Last name">
                                    <p class="error"></p>
                                </div>
                            </div>

                        </div>
                        <div id="yellow-separator"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Position</label>
                                    <select name="player_position" id="player-position" class="form-control">
                                        <option value="">select one</option>
                                        <option value="right side mitter">Rightside mitter</option>
                                        <option value="outside mitter">Outside mitter</option>
                                        <option value="middle block">Middle Block</option>
                                        <option value="sitter">sitter</option>
                                        <option value="opposite">opposite</option>
                                        <option value="Middle Block/Libero">Middle Block/Libero</option>

                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="col-xs-6">
                                    <label>Height</label>
                                    <input type="text" class="form-control" id="player-height" name="player_height" placeholder="height">
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                        <div id="yellow-separator"></div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="button"class="btn btn-primary register-player">Register Player</button>
                                <input type="reset"  hidden >
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
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
            $('div#manager-img button').on('click',function(){
                $('#manager-photo').click();
            })
            $('#manager-photo').on('change',function(e){
                showfile(this,'div#manager-img img#show-img')
            })
            //coach-image
            $('div#coach-img button').on('click',function(){
                $('#coach-photo').click();
            })
            $('#coach-photo').on('change',function(e){
                showfile(this,'div#coach-img img#show-coach-img')
            })
            //
            $('div#player-img button').on('click',function(){
                $('#player-photo').click();
            })
            $('#player-photo').on('change',function(e){
                showfile(this,'div#player-img img#show-player-img')
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

            $('.next').on('click',function(){
                var fieldSet=$(this)
                //add ajax function
                var next= $(this)
                if(next.val()=='teamInfo'){
                    //clear all display errors

                    $('#team-name').parent().find('p').html(' ')
                    $('#team-contact').parent().find('p').html(' ')
                    $('#team-phone').parent().find('p').html(' ')
                    $('#team-img').parent().find('p').html(' ')
                    $('#logo').parent().find('p').html(' ')
                    //get all values
                    var teamData= new FormData();
                    var teamLogo=$('#logo')[0].files[0];
                    var teamImage=$('#team-img')[0].files[0];
                    teamData.append('teamName',$('#team-name').val());
                    teamData.append('teamContact',$('#team-contact').val());
                    teamData.append('teamPhoneNumber',$('#team-phone').val());
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
                               var message= data.errors
                                //display error
                               // $(empty(message.teamName[0]))?$('#team-name').parent().find('p').html(''):$('#team-name').parent().find('p').html(''+message.teamName[0])
                                /*$('#team-name').parent().find('p').html(''+message.teamName[0])//team name error
                                $('#team-name').parent().find('p').html(''+message.teamName[0])//team name error*/

                                if(message.teamName === undefined ? null:$('#team-name').parent().find('p').html(''+message.teamName[0]));
                                if(message.teamContact === undefined ? null:$('#team-contact').parent().find('p').html(''+message.teamContact[0]));
                                if(message.teamPhoneNumber === undefined ? null:$('#team-phone').parent().find('p').html(''+message.teamPhoneNumber[0]));
                                if(message.teamLogo === undefined ? null:$('#logo').parent().find('p').html(''+message.teamLogo[0]));
                                if(message.teamImage === undefined ? null:$('#team-img').parent().find('p').html(''+message.teamImage[0]));

                                //$('#team-contact').parent().find('p').html(''+message.teamContact[0])// team contact error
                                /*$('#team-phone').parent().find('p').html(''+message.teamPhoneNumber[0])// team phone error
                                $('#logo').parent().find('p').html(''+message.teamLogo[0])// team phone error
                                $('#team-img').parent().find('p').html(''+message.teamImage[0])// team phone error
*/
                                // console.log((message.teamName[0]))
                            }else if(data.status=='next'){
                                //update teamindex
                                var alert='<div id="res" class="alert alert-success">Hi '+$('#team-name').val() +', Your team information was successfully saved. Please add your Coach details</div>';
                                $('#teamindex').val(data.team_id)
                                //move to next field

                                nextField(fieldSet,alert)
                            }
                        }

                    })
                   /* $.get('',{
                        teamName:$('#team-name').val(),
                        teamContact:$('#team-contact').val(),
                        teamPhoneNumber:$('#team-phone').val()
                    }, function(data){
                        if(data.status=='error'){
                            // display errors
                            message= data.errors
                            //display error
                            $('#team-name').parent().find('p').html(''+message.teamName[0])//team name error

                            $('#team-contact').parent().find('p').html(''+message.teamContact[0])// team contact error
                            $('#team-phone').parent().find('p').html(''+message.teamPhoneNumber[0])// team phone error

                            // console.log((message.teamName[0]))
                        }else if(data.status=='next'){
                            //update teamindex
                            var alert='<div id="res" class="alert alert-success">Hi '+$('#team-name').val() +', Your team information was successfully saved. Please add your Coach details</div>';
                            $('#teamindex').val(data.team_id)
                            //move to next field

                            nextField(fieldSet,alert)
                        }

                    })*/
                }else if(next.val()=='teamCoach'){
                    //clear all errors if any

                    $('#coach-fname').parent().find('p').html(' ')
                    $('#coach-lname').parent().find('p').html(' ')
                    $('#coach-photo').parent().find('p').html(' ')
                    var image=$('#coach-photo')[0].files[0];
                    var coachForm= new FormData();
                    coachForm.append('coach_photo',image)
                    coachForm.append('coachFirstName',$('#coach-fname').val())
                    coachForm.append('coachLastName',$('#coach-lname').val())
                    coachForm.append('team_index',$('#teamindex').val())
                    coachForm.append('_token',$('#token').val())

                    //send ajax request
                    $.ajax({
                        url:"{{route('CoachInfo')}}",
                        type:'POST',
                        data:coachForm,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            if(data.status=='next'){
                                //move to next field
                                var alert='<div id="res" class="alert alert-success">Nice, Team '+$('#team-name').val() +', Your making progress</div>';

                                nextField(fieldSet,alert)
                            }

                           var message= data.errors
                            //display error
                            if(message.coachFirstName === undefined ? null:$('#coach-fname').parent().find('p').html(''+message.coachFirstName[0]));
                            if(message.coachLastName === undefined ? null:$('#coach-lname').parent().find('p').html(''+message.coachLastName[0]));
                            if(message.coach_photo === undefined ? null:$('#coach-photo').parent().find('p').html(''+message.coach_photo[0]));

                        },

                    })

                }else if(next.val()=='managerInfo'){
                    //clear all errors if any
                    $('#manager-fname').parent().find('p').html(' ')
                    $('#manager-lname').parent().find('p').html(' ')
                    $('#manager-photo').parent().find('p').html(' ')
                    //send ajax request
                    //create form data
                    //to send images over with ajax you are required to create a form data
                    var managerForm= new FormData();
                   var managerImage=$('#manager-photo')[0].files[0]
                    managerForm.append('managerFirstName',$('#manager-fname').val());
                    managerForm.append('managerLastName',$('#manager-lname').val());
                    managerForm.append('team_index',$('#teamindex').val());
                    managerForm.append('managerImage',managerImage);
                    managerForm.append('_token',$('#token').val())
                    $.ajax({
                        url:"{{route('ManagerInfo')}}",
                        type:"POST",
                        processData:false,
                        contentType:false,
                        data:managerForm,
                        success:function(data){
                            if(data.status=='next'){
                                var alert='<div id="res" class="alert alert-success">Wow '+$('#team-name').val() +', We can"t wait to see your players</div>';
                                $('form#member-info #index').val($('#teamindex').val())
                                nextField(fieldSet,alert);
                            }
                            var message=data.errors

                            if(message.managerFirstName === undefined ? null:$('#manager-fname').parent().find('p').html(''+message.managerFirstName[0]));
                            if(message.managerLastName === undefined ? null:$('#manager-lname').parent().find('p').html(''+message.managerLastName[0]));
                            if(message.managerImage === undefined ? null:$('#manager-photo').parent().find('p').html(''+message.managerImage[0]));

/*                            $('#manager-fname').parent().find('p').html(''+message.managerFirstName[0])//manager first name error

                            $('#manager-lname').parent().find('p').html(''+message.managerLastName[0])// manager last name error
                            if(!empty(message.managerImage[0])){
                                $('#manager-photo').parent().find('p').html(''+message.managerImage[0])// manager last name error
                            }*/
                        }
                    })
                }


            })
            $('.prev').on('click',function(){
                current_fs=$(this).parent();
                prev_fs=$(this).parent().prev()

                //progressbar
                $('.progressive-bar li').eq($('fieldset').index(current_fs)).removeClass('active')
                //hide current_fs
                current_fs.hide()
                //show next fieldset
                prev_fs.show();
            })
            //register player
            $('.register-player').on('click',function(event){
                $('#player-fname').parent().find('p').html(' ')
                $('#player-lname').parent().find('p').html(' ')
                $('#player-position').parent().find('p').html(' ')
                $('#player-height').parent().find('p').html(' ')
                $('#player-photo').parent().find('p').html(' ')

                var playerForm = new FormData();
                var playerImage=$('div#add-player #member-info div#player-img input[type="file"]')[0].files[0]
                playerForm.append('player_position',$('#player-position').val())
                playerForm.append('player_height',$('#player-height').val())
                playerForm.append('player_lastName',$('#player-lname').val())
                playerForm.append('player_firstName',$('#player-fname').val())
                playerForm.append('player_image',playerImage)
                playerForm.append('_token',$('#token').val())
                playerForm.append('team_id',$('#index').val())
                //send request to ajax
                $.ajax({
                    url:'{{route('PlayerInfo')}}',
                    type:'POST',
                    data:playerForm,
                    contentType:false,
                    processData:false,
                    success:function(data){
                        if(data.status=='error'){
                           var message= data.errors

                            if(message.player_firstName === undefined ? null:$('#player-fname').parent().find('p').html(''+message.player_firstName[0]));
                            if(message.player_lastName === undefined ? null:$('#player-lname').parent().find('p').html(''+message.player_lastName[0]));
                            if(message.player_position === undefined ? null:$('#player-position').parent().find('p').html(''+message.player_position[0]));
                            if(message.player_height === undefined ? null:$('#player-height').parent().find('p').html(''+message.player_height[0]));
                            if(message.player_image === undefined ? null:$('#player-photo').parent().find('p').html(''+message.player_image[0]));



                        }else if(data.status=='player_saved'){
                            $('form.playerForm input[type=reset]').trigger('click');
                            //document.getElementById("m").reset();
                            $('.modal.in').modal('hide');
                            //return true;
                            //change preview image to default
                            //$('#show-player-img').target.src('images/user.jpg');
                            //load all players added
                            //loops player array
                            var players=data.newPlayers;
                            $('#vb-player-preview').html('')
                            var player_preview=""
                            for( i in players){
                                player_preview+='<div class="media" data-pid="'+players[i].team_id+'"> <div class="media-left"><img src="images/team/players/'+players[i].player_image+'" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>'+players[i].fname+' '+players[i].lname+'</span></li> <li><b>Height:</b> <span>'+players[i].height+'</span></li> <li><b>Position:</b> <span>'+players[i].position+'</span></li> <li><a href="#"  data-uid="'+players[i].id+'">remove</a></li> </ul> </div> </div> </div>'

                            }
                             //add_player='<div class="media" data-pid=""> <div class="media-left"><img src="" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>John don</span></li> <li><b>Height:</b> <span>200cm</span></li> <li><b>Position:</b> <span>Middle blocker</span></li> <li><a href="#" >remove</a></li> </ul> </div> </div> </div>'

                            $('#vb-player-preview').html(player_preview);
                            $('#show-player-img').attr('src','{{asset('images')}}/user.jpg')

                        }
                    }
                })


            })
            //delete player
            $('#vb-player-preview ul li a').on('click',function(e) {
                e.preventDefault();
                var userId = $('#vb-player-preview ul li a').attr('data-uid');
                console.log(userId)
            })

        })
    </script>
@endsection

