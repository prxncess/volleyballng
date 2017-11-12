@extends('layout')
@section('title')
    {!! $event->title !!}
    @endsection
@section('content')


    <article id="event">
        <header> <h2>{{$event->title}}</h2></header>
        <div id="media">
            <img src="images/event/{{$event->image}}" class="img-responsive center-block">
        </div>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Description</h3>
            <p>
                {{$event->description}}
            </p>
        </aside>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Date</h3>
            <span>Starting : {{ date('d F Y', strtotime($event->start_date))}} </span>
            <span>to: {{ date('d F Y', strtotime($event->end_date))}}</span>
        </aside>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Location</h3>
           {{-- <span>Teslim Balogun Stadium,</span>--}}
            <span>{{$event->e_location}} State</span>
        </aside>
        <section id="sub-links">
            <ul class="list-unstyled list-inline">
                <li><a href="{!! route('teamSignIn') !!}" class="btn btn-default">Register your team</a> </li>
                {{--<li><a href="#"><i class="fa fa-thumbs-o-up"></i></a> </li>
                <li><a href="#"><i class="fa fa-thumbs-o-down"></i></a> </li>
                <li><a href="#"><i class="fa fa-eye"></i></a> </li>--}}
            </ul>
        </section>
    </article>
@endsection