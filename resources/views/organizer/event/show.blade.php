@extends('organizer.layout')
@section('title')
    {{$event->title}}
    @endsection
@section('content')


    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('myEvents')}}">Events</a> </li>
            <li class="breadcrumb-item-active">{{$event->title}}</li>
        </ol>
        <header>
            <h2>Overview</h2>
            <div class="gray-separator bottom-40"></div>
        </header>
        <div id="" class="">
            @if($event->image!='')
                <img src="{{asset('images/event/'.$event->image)}}" class="img-responsive" style="max-width: 60%">
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
                <div class="col-sm-2"><p><strong>End date</strong> </p></div>
                <div class="col-sm-10"><p>{{date('jS F Y',$event->end_date)}}</p></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><p><strong>Location</strong></p></div>
                <div class="col-sm-10"><p>{{$event->e_location}} state</p></div>
            </div>

            <!-- <div class="row">
                <div class="col-sm-3"><strong>status</strong></div>
                <div class="col-sm-9">
                </div>
            </div> -->
            <div class="gray-separator top-40 bottom-40"></div>
                <header>
                    <h3>Registered Teams</h3>
                </header>
                <div class="bottom-20"></div>
                {{--check if any team is registered--}}

                @if($event->teams()->count()> 0)
                    {{--list teams registered--}}
                    <table class=" table table-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>View</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        @foreach($event->teams as $team)
                            <tr>
                                <td class="text-capitalize">{{$team->name}}</td>
                                <td><a href="{{route('ogSeeTeam',[$team->name])}}"><i class="fa fa-eye"></i> </a></td>
                                <td><a href="#"  class=""><i class="fa fa-remove"></i> </a> </td>
                            </tr>
                            @endforeach
                    </table>
                @else
                    <div class="swiper-notification">No registered teams yet.</div>
                @endif



            <div class="row">
                <div class="col-xs-6">
                    <a href="#" class="btn btn-purple top-40" id="delete-event"><i class="fa fa-trash right-5"></i>Delete</a>
                </div>
                <div class="col-xs-6">
                    <a href="{{route('upEvent',$event->slug)}}" class="btn btn-purple top-40" id="edit-event"><i class="fa fa-edit right-5"></i>Edit</a>
                </div>
            </div>

        </div>
    </div>
    @endsection
