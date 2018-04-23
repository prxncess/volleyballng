@extends('organizer.layout')
@section('title')
    {{$event->title}}
    @endsection
@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('myEvents')}}">events</a> </li>
            <li class="breadcrumb-item-active">{{$event->title}}</li>
        </ol>
        <header>
            <h2>Overview</h2>
            <div id="separator"></div>
        </header>
        <div id="ad-event-info" class="">
            @if($event->image!='')
                <img src="{{asset('images/event/'.$event->image)}}" class="img-responsive">
            @else
                <img class="img-responsive" src="{{asset('images/seuww.png')}}" style="width: 100px">
            @endif

            <div class="row">
                <div class="col-sm-3"><strong>Title</strong></div>
                <div class="col-sm-9">{{$event->title}}</div>
            </div>
            <div class="row">
                <div class="col-sm-3"><strong>Description</strong></div>
                <div class="col-sm-9">{{$event->description}}</div>
            </div>
            <div class="row">
                <div class="col-sm-3"><strong>Start date:</strong> {{date('jS F Y',$event->start_date)}}</div>
                <div class="col-sm-9"><strong>End date: </strong> {{date('jS F Y',$event->end_date)}}</div>
            </div>
            <div class="row">
                <div class="col-sm-3"><strong>Location</strong></div>
                <div class="col-sm-9">{{$event->e_location}} state</div>
            </div>

            <!-- <div class="row">
                <div class="col-sm-3"><strong>status</strong></div>
                <div class="col-sm-9">
                </div>
            </div> -->
            <div class="gray-separator top-20 bottom-20"></div>
                <header>
                    <h2>Registered Teams</h2>
                </header>
                {{--check if any team is registered--}}

                @if($event->teams()->count()> 0)
                    {{--list teams registered--}}
                    <table class=" table table-striped table-responsive">
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
                    <div class="swiper-notification">No team at the moment</div>
                @endif



            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('upEvent',$event->slug)}}" class="btn btn-purple top-40" id="edit-event"><i class="fa fa-edit right-5"></i>Edit event</a>
                    <a href="#" class="btn btn-purple top-40" id="delete-event"><i class="fa fa-trash right-5"></i>Delete event</a>
                </div>
            </div>

        </div>
    </div>
    @endsection