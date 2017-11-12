<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keyword" content="volley ball,nigerian volleyball leagues" >
    <meta name="robots" content="index,follow">
    <link href="https://fonts.googleapis.com/css?family=Questrial|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/swiper.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/volley.css') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('extra-style')
    <base href="http://localhost/volleyball/public/">
    <title>@yield('title')</title>

</head>
<body>

<div class="" id="background">
   @include('navbar.navbar')
    @yield('banner')
    <div id="wrapper">

        <section id="content">
            @yield('content')
        </section>

    </div>


</div>
<div id="footer">
    <div id="bar"></div>
    <footer>
        <section>
            <aside id="footer-links" class="center-block">
                <ul class="list-unstyled list-inline" id="footer-menu">
                    <li class=""><a href="{{route('home')}}">Home</a> </li>
                    <li class=""><a href="{{route('events')}}">Events</a> </li>
                    <li class=""><a href="{{route('viewTeams')}}">Teams</a> </li>
                    <li class=""><a href="{{route('viewGallery')}}">Gallery</a> </li>
                </ul>
            </aside>

        </section>
        {{--<div id="sponsor-brands">
            <ul class="list-unstyled">
                <li><i class="fa fa-windows"></i></li>
                <li><i class="fa fa-apple"></i></li>
                <li><i class="fa fa-amazon"></i></li>
            </ul>
        </div>--}}
        <div id="social-pages">
            <ul class="list-unstyled">
                <li><i class="fa fa-instagram"></i></li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-facebook"></i></li>
                <li><i class="fa fa-youtube-play"></i></li>
            </ul>
        </div>
        <hr>
        <aside id="copyright">
            <ul class="list-unstyled list-inline">
                <li>&copy; 2017 Volleyball.ng</li>
                <li>|</li>
                <li>All rights reserved</li>
                <li>|</li>
                <li>Terms & Privacy</li>
            </ul>
        </aside>

    </footer>
</div>

<script src="{!! asset('js/jquery-1.11.1.js') !!}"></script>
<script src="{!! asset('js/swiper.jquery.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script>

    var swiper = new Swiper('#slides', {
        slidesPerView: 'auto',
        /*paginationClickable: true,*/
        spaceBetween: 50,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplay: 5000,
    });
    var teamSlides = new Swiper('#team-slides', {
        slidesPerView: 'auto',
        /*paginationClickable: true,*/
        spaceBetween: 30,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplay: 5000,
    });
    var banners= new Swiper('#banners',{
        pagination: '.swiper-pagination',
        /*nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',*/
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 10000,
        autoplayDisableOnInteraction: false
    })
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#toggle-bar').on('click',function(){
            $('#volleymenu').show()
        })
        $('#close').on('click',function(e){
            e.preventDefault();
            $('#volleymenu').hide();
        })
        $('#wrapper,#home-banner').on('click',function(){
            $('#volleymenu').hide();
        })
    })
</script>
@yield('footer-scripts')
</body>
</html>