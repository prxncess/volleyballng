@extends('adminTeam.layout')
@section('title','New event Opening')
    @section('content')
        <div class="well well" id="admin-box">
            <h2 class="text-capitalize">{{$event->title}}</h2>
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @elseif(session('res'))
                <div class="alert alert-success">{{session('res')}}</div>
            @endif
        </div>
        <div class="well well" id="admin-box">
            <img src="{{asset('images/event/'.$event->image)}}" class="img-responsive">
        </div>
        <div class="well well" id="admin-box">
            <header>
                <h4 class="" id="">Description </h4>
                <div id="separator"></div>
            </header>

            <p> {{$event->description}}</p>
        </div>
        <div class="well well" id="admin-box">
            <div class="row">
                <div class="col-sm-4">
                    <header>
                        <h4 class="" id="">Event location/venue </h4>
                        <div id="separator"></div>
                    </header>
                    <p>{{$event->e_location}}</p>
                </div>
                <div class="col-sm-4">
                    <header>
                        <h4 class="" id="">Dates </h4>
                        <div id="separator"></div>
                    </header>
                    <p>
                        <span>Starting : {{ date('d F Y', $event->start_date)}} </span>
                        <span> <b>to:</b> {{ date('d F Y',$event->end_date)}}</span>
                    </p>
                </div>
                <div class="col-sm-4">
                    <header>
                        <h4 class="" id="">Organizer information </h4>
                        <div id="separator"></div>
                    </header>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-user-circle"></i> <span class="text-capitalize">{{$event->organizer[0]->organizer}}</span></li>
                        <li><i class="fa fa-phone-square"></i> <span class="text-capitalize">{{$event->organizer[0]->phone}}</span></li>
                        <li><i class="fa fa-envelope-square"></i> <span class="text-capitalize">{{$event->organizer[0]->email}}</span></li>

                    </ul>
                </div>

            </div>
            @if($event->status=='open')
            <a href="{{route('Interested',[$event->slug])}}" class="btn btn-primary" id="vb-button">show interest</a>
                @else
            <span>Status:</span> {{$event->status}}
            @endif
        </div>

        @endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#notifyTm').on('click',function () {
                //e.preventDefault();
                //send ajax request
                $.get({
                    url:'{{route('TmMarkRead')}}'
                })
            })
        })
    </script>
    @endsection