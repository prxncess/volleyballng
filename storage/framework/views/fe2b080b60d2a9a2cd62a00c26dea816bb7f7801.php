<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keyword" content="volley ball,nigerian volleyball leagues" >
    <meta name="robots" content="index,follow">
    <link href="https://fonts.googleapis.com/css?family=Questrial|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/swiper.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/volley.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->yieldContent('extra-style'); ?>
    <base href="http://volleyball.ng">
    <title><?php echo $__env->yieldContent('title'); ?></title>

</head>
<body>

<div class="" id="background">
   <?php echo $__env->make('navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('banner'); ?>
    <div id="wrapper">

        <section id="content">
            <?php echo $__env->yieldContent('content'); ?>
        </section>

    </div>


</div>
<div id="footer">
    <div id="bar"></div>
    <footer>
        <section>
            <aside id="footer-links" class="center-block">
                <ul class="list-unstyled list-inline" id="footer-menu">
                    <li class=""><a href="<?php echo e(route('home')); ?>">Home</a> </li>
                    <li class=""><a href="<?php echo e(route('events')); ?>">Events</a> </li>
                    <li class=""><a href="<?php echo e(route('viewTeams')); ?>">Teams</a> </li>
                    <li class=""><a href="<?php echo e(route('viewGallery')); ?>">Gallery</a> </li>
                </ul>
            </aside>

        </section>
        
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

<script src="<?php echo asset('js/jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo asset('js/swiper.jquery.min.js'); ?>"></script>
<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
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
<?php echo $__env->yieldContent('footer-scripts'); ?>
</body>
</html>