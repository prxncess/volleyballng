<?php $__env->startSection('title','Events Calender'); ?>
<?php $__env->startSection('content'); ?>

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>
        <p>
            Check out our exciting upcoming events and register your team!. Also create your own event and we'll publish it here.

        </p>

    </aside>
    <div id="events-subnav">
        <a href="<?php echo e(route('events')); ?>" >Events</a>
        <a href="<?php echo e(route('EventsCal')); ?>" class="active">Calender</a>
        <a href="<?php echo e(route('newEvent')); ?>">Register Event</a>
    </div>
    <div class="row">
        <div id="vb-calender" class=" col-md-12">
            <div class="">
                <h3 class="text-center">Calender</h3>
                <div id="calender">

                    
                    <aside>
                        <div id="calender-box">
                            <header>

                                <h4 class="text-center">
                                    <span class="pull-left"><i class="fa fa-angle-left">
                                        </i></span><i class="fa fa-calendar"></i> <?php echo e(date('F Y')); ?>

                                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                                </h4>

                            </header>
                            <div id="calender_section_top">
                                <ul>
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                </ul>
                            </div>
                            <div  id="bd-calender" class="swiper-container-horizontal swiper-container">

                                <ul class="list-unstyled">

                                    <?php echo $calender; ?>

                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div id="vb-schedules">
                    <header><h3><i class="fa fa-calendar-check-o"></i> Events for <?php echo e(date(' l F Y')); ?></h3>
                        <span id="schedule-count" class="text-info">(3) Events</span>
                    </header>

                    <div id="schedule">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="images/event/event1.png" style="width: 80px">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading"><h4><a href="#">6th annual susquehanna smash volleyball</a></h4></div>
                                        <ul class="media-list">
                                            <li><strong>Location:</strong><span> Akwa Ibom</span></li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="images/event/event2.png" style="width: 80px">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading"><h4><a href="#">Lotto volleyball</a></h4></div>
                                        <ul class="media-list">
                                            <li><strong>Location:</strong><span> Lagos</span></li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="images/event/event4.png" style="width: 80px">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading"><h4><a href="#">Premier volleyball League</a></h4></div>
                                        <ul class="media-list">
                                            <li><strong>Location:</strong><span> Kaduna</span></li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>