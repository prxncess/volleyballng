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
          <div class="col-xs-12"><h3 class="bottom-40">Videos</h3></div>
            @foreach($videoList->items as $item)
                @if(isset($item->id->videoId))
                    <div class=" col-md-6 col-sm-6 bottom-40">
                        <div class="youtube-video">
                            <iframe width="100%" height="320" src="https://www.youtube.com/embed/{{$item->id->videoId}}" frameborder="0" allowfullscreen></iframe>
                            <h4>{{$item->snippet->title}}</h4>
                        </div>
                    </div>
                    @endif

                @endforeach
                <div class="col-xs-12 text-center">
                  <a class="btn btn-purple" href="">Load more...</a>
                </div>

        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="gray-separator top-40 bottom-40"></div>
            <h3>Photos</h3>
            <h5 class="bottom-40">Scroll within the frame to see more photos, or click <a href="http://facebook.com/volleyball.ng">here</a> to see the full Facebook page</h5>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvolleyball.ng&tabs=timeline&width=720&height=960&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="720px" height="960px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
          </div>
        </div>
    </section>
    @endsection
