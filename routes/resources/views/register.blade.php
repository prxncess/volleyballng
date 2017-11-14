@extends('layout')
@section('title','Register your team')
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
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
                <li class="breadcrumb-item active">Team Registration</li>
            </ol>
        </header>
        <ul class="progressive-bar center-block">
            <li class="active">Team info</li>
            <li>Coach</li>
            <li>Manager</li>
            <li>Players</li>

        </ul>
        <form method="post" id="proForm" class=" center-block add-team" enctype="multipart/form-data">
            {{csrf_field()}}
            <fieldset>
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
                </div>

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
                 {{--       <div id="yellow-separator"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Position</label>
                                    <select name="member-postion" id="coach-position" class="form-control">
                                        <option>select one</option>
                                        <p></p>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label>Height</label>
                                    <input type="text" class="form-control" id="coach-height" name="member-height" placeholder="height">
                                    <p></p>
                                </div>
                            </div>
                        </div>--}}
                        <div id="yellow-separator"></div>
                    </div>
                </div>
                <button type="button" class="prev btn btn-default">Previous</button>
                <button type="button" value="teamCoach" class="next btn btn-default">Save & Continue</button>
            </fieldset>
            <fieldset>
                <h4> Add Manager</h4>
                <div id="add-player">
                    <div id="member-info">
                        <div class="" id="manager-img">
                            <img src="{!! asset('images/user.jpg') !!}" id="show-img">
                            <button type="button" >
                                upload image
                            </button>
                            {{--<l class="fa fa-plus"></l>--}}
                            <input type="file" name="manager-photo" id="manager-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
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
                        {{--<div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Position</label>
                                    <select name="member-postion" id="member-postion" class="form-control">
                                        <option>select one</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label>Height</label>
                                    <input type="text" class="form-control" id="member-height" name="member-height" placeholder="height">
                                </div>
                            </div>
                        </div>
                        <div id="yellow-separator"></div>--}}
                    </div>
                </div>
                <button type="button" class="prev btn btn-default">Previous</button>
                <button type="button" value="managerInfo" class="next btn btn-default">Save & Continue</button>
            </fieldset>

            <fieldset>
                <h4>Add Players</h4>
                <div id="team-data" class="row">

                    <div class=" col-xs-6 col-sm-6 col-md-6"> <div id="added-member">
                            <div class="" id="">
                                <p>Their currently no players. Please add a player</p>
                            </div>
                        </div></div>
                    <div class=" col-xs-6 col-sm-6 col-md-6"> <div id="team-member"><i id="add-more" class="fa fa-plus"></i></div></div>


                </div>
                <button type="button" class="prev btn btn-default">previous</button>
                <button type="submit" class="submit btn btn-default">Submit</button>
            </fieldset>
        </form>


    </section>
    @endsection
@include('team.addTeam')
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add-more').on('click',function(){
                $('div#add-player').modal();
            })
            //close modal
/*            $('.close').on('click',function(){
                $('div#add-player').modal('hide')
                $('body').removeClass().removeAttr('style').removeAttr('class');
                $('.modal-backdrop').remove();
            })
            $('.modal-backdrop').on('click',function(){$('.modal-backdrop').remove()})
            $('body.modal-backdrop').on('click',function(){
                $('.modal-backdrop').remove();
            });*/
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
            function nextField(fieldset){
                current_fs=$(fieldset).parent();
                next_fs=$(fieldset).parent().next()

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
                    $.get('{{route("TeamInfo")}}',{
                        teamName:$('#team-name').val(),
                        teamContact:$('#team-contact').val()
                    }, function(data){
                        if(data.status=='error'){
                            // display errors
                            message= data.errors
                            //display error
                            $('#team-name').parent().find('p').html(''+message.teamName[0])//team name error

                            $('#team-contact').parent().find('p').html(''+message.teamContact[0])// team contact error

                           // console.log((message.teamName[0]))
                        }else if(data.status=='next'){
                            //move to next field
                           nextField(fieldSet)
                        }

                    })
                }else if(next.val()=='teamCoach'){
                    //clear all errors if any
                    $('#coach-fname').parent().find('p').html(' ')
                    $('#coach-lname').parent().find('p').html(' ')
                    //send ajax request
                    $.get("{{route('CoachInfo')}}",{
                        'coachFirstName':$('#coach-fname').val(),
                        'coachLastName':$('#coach-lname').val(),
                        /*'coachPhoto':$('#caoch-')*/
                    },function(data){
                        if(data.status=='error'){
                            // display errors
                            message= data.errors
                            //display error
                            $('#coach-fname').parent().find('p').html(''+message.coachFirstName[0])//team name error

                            $('#coach-lname').parent().find('p').html(''+message.coachLastName[0])// team contact error

                            // console.log((message.teamName[0]))
                        }else if(data.status=='next'){
                            //move to next field
                            nextField(fieldSet)
                        }
                    })
                }else if(next.val()=='managerInfo'){
                    //clear all errors if any
                    $('#manager-fname').parent().find('p').html(' ')
                    $('#manager-lname').parent().find('p').html(' ')
                    //send ajax request
                    $.get("{{ route('ManagerInfo') }}",{
                        'managerFirstName':$('#manager-fname').val(),
                        'managerLastName':$('#manager-lname').val(),
                        /*'managerPhoto':$('#manager-photo-')*/
                    },function(data){
                        if(data.status=='error'){
                            // display errors
                            message= data.errors
                            //display error
                            $('#manager-fname').parent().find('p').html(''+message.managerFirstName[0])//manager first name error

                            $('#manager-lname').parent().find('p').html(''+message.managerLastName[0])// manager last name error

                        }else if(data.status=='next'){
                            //move to next field
                            nextField(fieldSet)
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

        })
    </script>
    @endsection