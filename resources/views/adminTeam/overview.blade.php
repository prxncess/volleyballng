@extends('adminTeam.layout')
@section('title','Team Overview')
@section('content')

    <section id="team-overview">

        <div id="admin-box" class="well well">
            <header>
                <h2>Team Overview</h2>
                <div id="separator"></div>
            </header>
            <div class="row">
                <div class="col-sm-4" id="teamInfo">
                    <div class="text-left">
                        @if($team->logo==null)
                            <img src="{{asset('images/ball.png')}}" class="img-responsive">
                        @else
                            <img src="{{asset('images/team/'.$team->logo)}}" class="img-responsive">
                        @endif
                    </div>
                    <div id="" class="top-20 bottom-20 gray-separator"></div>
                    <ul class="list-unstyled">
                        <li><span>{{$team->name}}</span></li>
                        <li><span><a href="mailto:{{$team->contact}}">{{$team->contact}}</a></span></li>
                        <li><span><a href="tel:{{$team->phone}}">{{$team->phone}}</a></span></li>
                        <li>Contact person: {{$team->contact_person}}</li>
                        <!-- <li><a href="">History</a> </li> -->

                        <li class="top-20">
                            <a href="{{route('teamUpdate')}}" id="editTeam" class="btn btn-purple right-10"><i class="fa fa-edit right-10"></i>Edit</a>
                            <a href="javascript:;" id="team_image" class="btn btn-purple"><i class="fa fa-image right-5"></i>Team image</a>
                        </li>
                        <div id="" class="top-20 bottom-20 gray-separator"></div>
                         <li id="teamStatus"><span>Status:</span>
                         @if($team->active==0)
                                 <i style="color:#bebebe" class="fa fa-circle"></i>
                                 <span style="color: #7e7e7e">Inactive</span>
                             <p style="font-size: 12px" class="">
                                 To be approved and activated, please add at least 6 players, 1 management staff and a team photograph to your profile.
                             </p>
                             <a href="javascript:;" id="reviewTeam" data-name="{{$team->name}}" data-mail="{{$team->contact}}" class="btn btn-purple bottom-20">Request activation</a>
                             @else
                                 <i style="color:#009B8A"class="fa fa-check"></i>
                                 <span style="color: #009B8A">Active</span>
                             @endif
                         </li>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        @if(session('res'))
                            <div class="alert alert-success">{{session('res')}}</div>
                        @endif
                        <div id="response"></div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default" id="teamPlayers" >
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3>Players</h3>
                                    </a>

                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class=" col-xs-12"> <div id="added-member">
                                                <div class="row" id="vb-player-preview">
                                                    @if($team->players->isEmpty())
                                                        <p>No players yet - click 'New player' to get started.</p>
                                                    @else
                                                        @foreach($team->players as $player)
                                                            <div class="col-xs-6 col-sm-6">
                                                                <a href="{{route('showPlayer',[$player->id])}}">
                                                                    <img src="{{asset('images/team/players/'.$player->player_image)}}" style="width: 160px; height: 140px">
                                                                    <h5 class="text-center text-capitalize">{{$player->fname.' '.$player->lname}}</h5>
                                                                </a>

                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div></div>
                                    </div>
                                    <div class="panel-footer">
                                        <button id="vb-button" class="btn btn-primary vb-add-player"><i class="fa fa-plus"></i> New player </button>

                                    </div>
                                </div>

                            </div>
                            <div class="panel panel-default" id="teamStaff">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                        <h3>Staff</h3>
                                    </a>

                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row" id="vb-preview-staff">
                                            @if($team->staff->isEmpty())
                                                <div class="col-xs-12"> <p class="">No team staff yet - click 'New staff' to get started.</p></div>
                                            @else
                                                @foreach($team->staff as $staff)
                                                    <div class="col-xs-6">
                                                        @if($staff->image=='')
                                                            <img src="{!! asset('images/user.jpg') !!}" class="img-responsive">
                                                        @else
                                                            <img src="{{asset('images/team/'.$staff->image)}}" class="img-responsive">
                                                        @endif

                                                        <ul class="list-unstyled">
                                                            <li>Position: <span>{{$staff->position}}</span></li>
                                                            <li><span><a href="{{route('viewStaff',$staff->id)}}"> {{$staff->fname.' '.$staff->lname}}</a></span></li>
                                                        </ul>
                                                    </div>

                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="button"  id="vb-button" class="btn btn-primary addManager"><i class="fa fa-plus"></i> New staff </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('adminTeam.popup.newPlayer')
        @include('adminTeam.popup.newStaff')
        @include('adminTeam.popup.teamImage')
    </section>
@endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#deleteTeam').on('click',function(){
                if(confirm('Are you sure you want to delete this team?')==false){
                    return false;
                }
            });
            $('section#team-overview button#register-players').on('click',function(){
                $('#player-fname').parent().find('p').html(' ');
                $('#player-lname').parent().find('p').html(' ');
                $('#player-position').parent().find('p').html(' ');
                $('#player-height-feet').parent().find('p').html(' ');
                $('#player-height-feet').parent().find('p').html(' ');
                $('#player-photo').parent().find('p').html(' ');
                var playerForm = new FormData();
                var playerImage=$('div#add-player #member-info div#player-img input[type="file"]')[0].files[0]
                playerForm.append('player_position',$('#player-position').val())
                playerForm.append('player_height_feet',$('#player-height-feet').val())
                playerForm.append('player_height_inches',$('#player-height-inches').val())
                playerForm.append('player_lastName',$('#player-lname').val())
                playerForm.append('player_firstName',$('#player-fname').val())
                playerForm.append('player_image',playerImage)
                playerForm.append('_token',$('#_token').val())
                playerForm.append('team_id',$('#index').val())
                //send request to ajax
                $.ajax({
                    url:'{{route('newPlayers')}}',
                    type:'POST',
                    data:playerForm,
                    contentType:false,
                    processData:false,
                    success:function(data){
                        if(data.status=='error'){
                            var message= data.errors;
                            if(message.player_firstName===undefined?null:$('#player-fname').parent().find('p').html(''+message.player_firstName[0]));
                            if(message.player_lastName===undefined?null:$('#player-lname').parent().find('p').html(''+message.player_lastName[0]));
                            if(message.player_height_feet===undefined?null:$('#player-height-feet').parent().find('p').html(''+message.player_height_feet[0]));
                            if(message.player_height_inches===undefined?null:$('#player-height-inches').parent().find('p').html(''+message.player_height_inches[0]));
                            if(message.player_position===undefined?null: $('#player-position').parent().find('p').html(''+message.player_position[0]));
                            if(message.player_image===undefined?null:$('#player-photo').parent().find('p').html(''+message.player_image[0]));






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
                                player_preview+='<div class="col-xs-6 col-sm-6"><a href="teamPlayer/'+players[i].id+'"><img src="{{asset('images/team/players')}}/'+players[i].player_image+'" style="width: 160px; height: 140px"> <h5 class="text-center text-capitalize">'+players[i].fname+' '+players[i].lname+'</h5> </a></div>'
                                // player_preview+='<div class="media" data-pid="'+players[i].team_id+'"> <div class="media-left"><img src="images/team/players/'+players[i].player_image+'" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>'+players[i].fname+' '+players[i].lname+'</span></li> <li><b>Height:</b> <span>'+players[i].height+'</span></li> <li><b>Position:</b> <span>'+players[i].position+'</span></li> <li><a href="#" >remove</a></li> </ul> </div> </div> </div>'

                            }
                            //add_player='<div class="media" data-pid=""> <div class="media-left"><img src="" style="width: 60px;" class="media-object"> </div> <div class="media-body"> <ul class="list-unstyled"> <li><b>Name:</b> <span>John don</span></li> <li><b>Height:</b> <span>200cm</span></li> <li><b>Position:</b> <span>Middle blocker</span></li> <li><a href="#" >remove</a></li> </ul> </div> </div> </div>'

                            $('#vb-player-preview').html(player_preview);
                            $('#show-player-img').attr('src','{{asset('images')}}/user.jpg')

                        }
                    }
                })
            });
            $('button.addManager').on('click',function(){
                $('#add-manager').modal('show')
            })
            $('button.vb-add-player').on('click',function(){
                $('#add-player').modal('show')
            })

            //member-img
            $('div#manager-img button').on('click',function(){
                $('#manager-photo').click();
            })
            $('#manager-photo').on('change',function(e){
                showfile(this,'div#manager-img img#show-img')
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

            $('div#player-img button').on('click',function(){
                $('#player-photo').click();
            })
            $('#player-photo').on('change',function(e){
                showfile(this,'div#player-img img#show-player-img')
            })
            $('section#team-overview button.addStaff').on('click',function(){
                $('#manager-fname').parent().find('p').html(' ')
                $('#manager-lname').parent().find('p').html(' ')
                $('#manager-photo').parent().find('p').html(' ')
                $('#staffPosition').parent().find('p').html(' ')
                $('#staffDescription').parent().find('p').html(' ')
                //send ajax request
                //create form data
                //to send images over with ajax you are required to create a form data
                var managerForm= new FormData();
                var managerImage=$('#manager-photo')[0].files[0]
                if(managerImage==undefined){
                    managerImage='';
                }
                managerForm.append('staffFirstName',$('#manager-fname').val());
                managerForm.append('staffLastName',$('#manager-lname').val());
                managerForm.append('staffPosition',$('#staffPosition').val());
                managerForm.append('staffDescription',$('#staffDescription').val());
                managerForm.append('team_index',$('#teamindex').val());
                managerForm.append('staffImage',managerImage);
                managerForm.append('_token',$('#_token').val())
                $.ajax({
                    url:"{{route('newStaff')}}",
                    type:"POST",
                    processData:false,
                    contentType:false,
                    data:managerForm,
                    success:function(data){
                        if(data.status=='saved'){
                            $('#vb-preview-staff').html('')
                            var staff=data.newStaff;
                            var staff_preview=""
                            for( i in staff){
                                if(staff[i].image==''){
                                    staffImag='{{asset('images')}}/user.jpg'
                                }else{
                                    staffImag= '{{asset('images/team/')}}/'+staff[i].image
                                }
                                staff_preview+='<div class="col-xs-6"><img src="'+staffImag+'" class="img-responsive">   <ul class="list-unstyled"> <li>Position: <span>'+staff[i].position+'</span></li> <li><span><a href="showStaff/'+staff[i].id+'">'+staff[i].fname+' '+staff[i].lname+'</a></span></li> </ul></div>'
                            }
                            //console.log(staff_preview)

                            $('#vb-preview-staff').html(staff_preview)
                            $('#add-manager').modal('hide')
                            $('form#member-info input[type=reset]').trigger('click');
                            $('#show-img').attr('src','{{asset('images')}}/user.jpg')

                        }else if(data.status=='error'){
                            if(data.exist){
                                $('#team-overview div#add-manager form div#res').html('<div class="alert alert-danger">'+data.exist+'</div>')
                            }else{
                                message=''
                                message=data.errors
                                $('#manager-fname').parent().find('p').html(''+message.staffFirstName[0])//manager first name error

                                $('#manager-lname').parent().find('p').html(''+message.staffLastName[0])// manager last name error
                                $('#staffPosition').parent().find('p').html(''+message.staffPosition[0])// manager last name error
                                $('#staffDescription').parent().find('p').html(''+message.staffDescription[0])// manager last name error
                                if(!empty(message.managerImage[0])){
                                    $('#manager-photo').parent().find('p').html(''+message.managerImage[0])// manager last name error
                                }
                            }


                        }

                    }
                })
            })
            //edit team
            $('#editTeam').on('click',function(){
                $('#manageTeam').modal('show')
            })
            //upload logo
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
            //manage team
            $('#team_image').on('click',function(){
                $('#seeTeamImage').modal('show')
            })
            //request for review
            $('#reviewTeam').on('click',function(){
                //send mail to volleyball admin requesting for a team review
                var email=$('#reviewTeam').data('mail')
                var name=$('#reviewTeam').data('name')
                //make ajax request
                $.ajax({
                    url:"{{route('tmReview')}}",
                    type:"GET",
                    data:{'email':email,'name':name},
                    success:function(data){
                        if(data.status=='success'){
                            $('div#response').html('<div class="alert alert-success">'+data.response+'</div>')
                           // $('div#response').fadeOut('80000')

                        }
                    }

                })


            })

            //hide notification
         /*   $("#response").hide().first().show();
            setTimeout(showNotifications, 5000);
            function showNotifications(){
                $("#response:visible").remove();
                $("#response").first().show();
                if($("#response").length > 0){
                    setTimeout(showNotifications, 5000);
                }
            }*/


        })

    </script>
@endsection
