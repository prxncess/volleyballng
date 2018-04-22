@extends('layout')
@section('title','Page not Found')
@section('content')
    <section id="page-not-found">
        <header>
            <h1 class="text-center" style="color: #c90000">Page Not Found</h1>
            <h3 class="text-center"><a href="{{url()->previous()}}"><i class="fa fa-arrow-left"></i> Go Back</a> </h3>
        </header>
    </section>
    @endsection