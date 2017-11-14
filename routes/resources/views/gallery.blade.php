@extends('layout')
@section('title','Gallery')
@section('content')

    <section id="Gallery">
        <header >
            <h2>Gallery</h2>
            <div id="yellow-separator"></div>
            {{--  --}}
        </header>
        <div id="media" class="row">
            @foreach($videoList->items as $item)
                @if(isset($item->id->videoId))
                    <div class=" col-md-6 col-sm-6">
                        <div class="youtube-video">
                            <iframe width="400" height="300" src="https://www.youtube.com/embed/{{$item->id->videoId}}" frameborder="0" allowfullscreen></iframe>
                            <h4>{{$item->snippet->title}}</h4>
                        </div>
                    </div>
                    @endif

                @endforeach


        </div>
    </section>
    @endsection