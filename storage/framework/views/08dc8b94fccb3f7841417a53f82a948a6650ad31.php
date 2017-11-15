<?php $__env->startSection('title','Events'); ?>
<?php $__env->startSection('content'); ?>

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>
        <p>
            Check out our exciting upcoming events and register your team!. Also create your own event and we'll publish it here.

        </p>
        <p></p>

    </aside>
    <div id="events-subnav">
        <a href="<?php echo e(route('events')); ?>" class="active">Events</a>
        <a href="<?php echo e(route('EventsCal')); ?>">Calender</a>
        <a href="<?php echo e(route('newEvent')); ?>">Register Event</a>
    </div>
    <div id="bd-event" >
        <div class="row">
            <div id="event-list" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="row">
                     <?php if($events->isEmpty()): ?>
                         <h3>We currently have no events open at the moment please do check back</h3>
                         <?php else: ?>
                         <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                             <div id="event-thumb" class="col-md-3  col-sm-4  col-xs-12">
                                 <h3><a href="<?php echo e(route('viewEvent',$event->slug)); ?>"><?php echo $event->title; ?></a></h3>
                                 <img src="<?php echo e(asset('images/event/'.$event->image)); ?>">
                                 <header>
                                     <div id="bar"></div>
                                     <p><?php echo $event->description; ?> <a href="<?php echo e(route('viewEvent',$event->slug)); ?>">More</a> </p>
                                 </header>
                             </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                         <?php endif; ?>
                 </div>
            </div>

        </div>
        <div class="center-block">
            
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var calender= new Swiper('#bd-calender',{
                /*pagination: '.swiper-pagination',*/
                nextButton: '.swiper-button-next',
                 prevButton: '.swiper-button-prev',
                /*paginationClickable: true,*/
                spaceBetween: 1,
               /* centeredSlides: true,*/
                //autoplay: 2500,
                slidesPerView:'auto',
                /*autoplayDisableOnInteraction: false*/
            })
        })
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>