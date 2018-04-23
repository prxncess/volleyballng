@extends('admin.layout')
@section('title','volleyball Event')
@section('content')

    <div id="show-event container" class="">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Events')}}">Events</a> </li>
                <li class="breadcrumb-item-active">{{$event->title}}</li>
            </ol>
        <div id="admin-box" class="well well">
            {{--<div id="events-subnav">
                <a href="{{route('viewTeams')}}">Event Information</a>
                <a href="{{route('register')}}" class="active">Organizers</a>
                <a href="{{route('teamSignIn')}}">Status</a>
            </div>--}}
            @if(session('status') && session('status')=='updated')
                <div class="alert alert-success">Event status has been updated</div>
            @endif
            <header>
                <h2>Overview</h2>
                <div class="gray-separator bottom-40"></div>
            </header>
                <div id="" class="">
                    @if($event->image!='')
                        <img src="{{asset('images/event/'.$event->image)}}" class="img-responsive">
                    @else
                        <img class="img-responsive" src="{{asset('images/seuww.png')}}" style="width: 100px">
                    @endif

                    <div class="top-40"></div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Title</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->title}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Description</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->description}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Start date</strong></p></div>
                        <div class="col-sm-10"><p>{{date('jS F Y',$event->start_date)}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>End date</strong></p> </div>
                        <div class="col-sm-10"><p>{{date('jS F Y',$event->end_date)}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Location</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->e_location}} state</p></div>
                    </div>

                    <h4 class="top-40"><i class="fa fa-user"></i> Organizer information</h4>
                    <div class="gray-separator bottom-20"></div>

                    <div class="row">
                        <div class="col-sm-2"><p><strong>Organizer</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->organizer[0]->organizer}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Phone</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->organizer[0]->phone}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><p><strong>Email</strong></p></div>
                        <div class="col-sm-10"><p>{{$event->organizer[0]->email}}</p></div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-3"><strong>status</strong></div>
                        <div class="col-sm-9">
                        </div>
                    </div> -->
                    <div class="gray-separator top-20 bottom-20"></div>
                    <h4 class=""><i class="fa fa-clock"></i> Status</h4>
                    <div class="row">
                      <div class="col-xs-12">
                        <form method="post" action="{{route('showEvent',$event->slug)}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="status">
                                        @foreach($status as $stat)
                                            @if($stat==$event->status)
                                                <option value="{{$event->status}}" selected>{{$event->status}}</option>
                                            @else
                                                <option value="{{$stat}}" >{{$stat}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn vb-button">Update</button>
                                </div>
                            </div>

                        </form>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{route('deleteEvent',$event->slug)}}" class="btn btn-purple top-40" id="delete-event"><i class="fa fa-trash fa-fw"></i>Delete</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="" class="btn btn-purple top-40 right-10" id="mail-organizer"><i class="fa fa-envelope fa-fw"></i>Contact organizer</a>
                        </div>
                    </div>

                    <div class="top-40"></div>

                </div>

        </div>
    </div>
    @endsection
@include('organizer.popup.contact')
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete-event').on('click',function(){
                if(confirm('Are you sure you to delete this event')==false){
                    return false;
                }
            })
            //show organizer mail
            $('#mail-organizer').on('click',function (e) {
                e.preventDefault();
                $('#contact-organizer').modal('show');
            })
            //show mail form to organizer
            $('#send-mail').on('click',function(){
                //send ajax request
                //clear errors if any found
                $('#mail-subject').parent().find('p').html(' ')
                $('#mail-body').parent().find('p').html(' ')
                $('div#contact-organizer div#res').html(' ');
                //get values from form
                var mailSubject=$('#mail-subject').val();
                var mailMessage=$('#mail-body').val();
                var index=$('#index').val();
                var token=$('#token').val();
                $.ajax({
                    url:'{{route('mailOrganizer')}}',
                    data:{'subject':mailSubject,'body':mailMessage,'index':index,'_token':token},
                    success:function (data) {
                        if(data.res=='error'){
                            var message=data.errors;
                            //display errors
                            if(message.subject===undefined?null:$('#mail-subject').parent().find('p').html(''+message.subject[0]));
                            if(message.body===undefined?null:$('#mail-body').parent().find('p').html(''+message.body[0]));
                        }else if(data.res=='success'){
                            //mail sent
                            $('div#contact-organizer div#res').html('<div class="alert alert-success">mail sent</div>');
                            $('div#contact-organizer form input[type=reset]').trigger('click');
                            //document.getElementById("m").reset();
                            setTimeout(function () {
                                $('.modal.in').modal('hide');
                            },5000)


                        }


                    }
                })
            })


        })
    </script>

    @endsection
