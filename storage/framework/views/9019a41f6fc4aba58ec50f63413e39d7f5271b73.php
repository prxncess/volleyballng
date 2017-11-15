<?php $__env->startSection('title','Welcome to Volleyball.ng'); ?>
<?php $__env->startSection('banner'); ?>
    <div id="home-banner">
        <div id="banners" class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
                <div class="swiper-slide"  style="background: url('<?php echo asset('images/banner1.png'); ?>'); height: 400px; background-size: 100% 100% "></div>
                <div class="swiper-slide" style="background: url('<?php echo asset('images/banner2.png'); ?>');height: 400px; background-size: 100% 100%;"></div>
                <div class="swiper-slide" style="background: url('<?php echo asset('images/banner3.png'); ?>');height: 400px; background-size: 100% 100%;"></div>
            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                <span class="swiper-pagination-bullet"></span>
                 <span class="swiper-pagination-bullet"></span>>
            </div>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section id="our-home">
        <header id="tagline">
            <h1 class="text-center">PLAY. WATCH. LAUGH</h1>
            <p>  Welcome to the home of Volleyball in Nigeria</p>


        </header>
        <article>
            <header><a href="<?php echo e(route('events')); ?>"><h2><i class="fa fa-calendar"></i> Events</h2></a>

                <div id="yellow-separator"></div>
                <div class="row">
                  <div class = "col-xs-6"><p>Coming up next...</p></div>
                  <div class = "col-xs-6 text-right"><a href="<?php echo e(route('newEvent')); ?>" class="btn btn-purple"><i class="fa fa-plus right-5"></i>Create Event</a></div>
                </div>
                <!-- <p>
                    See what we have been up to.<a href="<?php echo e(route('newEvent')); ?>"><span class="pull-right"><i class="fa fa-plus"></i>Create Event</span></a>
                </p> -->
            </header>

        </article>
        <div id="slides" class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
                <?php if($events->isEmpty()): ?>
                   
                <div class="swiper-slide swiper-slide-active">
                    <div id="box">
                        <a href="<?php echo route('viewEvent','conferdrations-cup'); ?>">
                            <img src="<?php echo e(asset('images/IMG_20170222_070951.jpg')); ?>">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p> <a href="<?php echo route('viewEvent','conferdrations-cup'); ?>"> Lagos Cup. 2016</a></p>
                    </header>
                </div>
                <div class="swiper-slide">
                    <div id="box">
                        <a href="<?php echo route('viewEvent','conferdrations-cup'); ?>">
                            <img src="<?php echo e(asset('images/IMG_20170222_070926.jpg')); ?>">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p><a href="<?php echo route('viewEvent','conferdrations-cup'); ?>"> Lagos trial. 2017</a></p>
                    </header>
                </div>
                <div class="swiper-slide">
                    <div id="box">
                        <a href="<?php echo route('viewEvent','conferdrations-cup'); ?>">
                            <img src="<?php echo e(asset('images/IMG_20170222_070958.jpg')); ?>">
                            <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                        </a>

                    </div>

                    <header>
                        <div id="bar"></div>
                        <p><a href="<?php echo route('viewEvent','conferdrations-cup'); ?>"> Open PH. 2017</a></p>
                    </header>
                </div>
                    <?php else: ?>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="swiper-slide swiper-slide-active">
                            <div id="box">
                                <a href="<?php echo route('viewEvent',$event->slug); ?>">
                                    <img src="<?php echo e(asset('images/event/'.$event->image)); ?>">
                                    <div id="more-photos"> <i class="fa fa-info-circle"></i><h3>More info</h3></div>
                                </a>

                            </div>

                            <header>
                                <div id="bar"></div>
                                <p> <a href="<?php echo route('viewEvent',$event->slug); ?>"><?php echo e($event->title); ?></a></p>
                            </header>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                <?php endif; ?>
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>

        <div class="gray-background top-bottom-padding-40">
          <article>
            <header>
                <a href="<?php echo e(route('viewTeams')); ?>"><h2><i class="fa fa-group"></i> Teams</h2></a>
                <div id="yellow-separator"></div>
                <div class="row">
                  <div class="col-sm-6"><p>Groups of volleyball <a href="<?php echo e(route('viewTeams')); ?>">lovers</a>, players, coaches, etc</p></div>
                  <div class="col-sm-6 text-right"><a href="<?php echo e(route('register')); ?>" class="btn btn-purple"><i class="fa fa-plus right-5"></i> Register a team</a></div>
                </div>
                <!-- <p>Check out our <a href="<?php echo e(route('viewTeams')); ?>">Teams</a> . <a href="<?php echo e(route('register')); ?>"><span class="pull-right"><i class="fa fa-plus"></i> Register</span></a></p> -->

            </header>
          </article>
          <article id="vb-home-team">
              <div id="team-slides" class="swiper-container swiper-container-horizontal">

                  <div class="swiper-wrapper">
                      <?php if($teams->isEmpty()): ?>

                      <div class="swiper-slide swiper-slide-active" >
                          <div id="box">
                              <a href="javascript:;">
                                  <img src="<?php echo asset('images/IMG_20170222_071011.jpg'); ?>">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3> </div>
                              </a>

                          </div>

                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Bulls</a></p>
                          </header>
                      </div>
                      <div class="swiper-slide" >

                          <div id="box">
                              <a href="javascript:;">
                                  <img src="<?php echo asset('images/IMG_20170222_070951.jpg'); ?>">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3></div></a>

                          </div>
                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Sharks</a></p>
                          </header>
                      </div>
                      <div class="swiper-slide swiper-slide-active" >
                          <div id="box">
                              <a href="javascript:;">
                                  <img src="<?php echo asset('images/IMG_20170222_071011.jpg'); ?>">
                                  <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3></div>
                              </a>

                          </div>

                          <header>
                              <div id="bar"></div>
                              <p><a href=""> Shells</a></p>
                          </header>
                      </div>
                          <?php else: ?>
                          <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <div class="swiper-slide" >

                                  <div id="box">
                                      <a href="<?php echo e(route('seeTeam',$team->name)); ?>">
                                          <?php if($team->team_image==null): ?>
                                              <img src="<?php echo asset('images/IMG_20170222_070951.jpg'); ?>">
                                          <?php else: ?>
                                              <img src="<?php echo e(asset('images/team/group/'.$team->team_image)); ?>" >
                                          <?php endif; ?>

                                          <div id="more-photos"><i class="fa fa-ellipsis-h"></i><h3>View more</h3></div></a>

                                  </div>
                                  <header>
                                      <div id="bar"></div>
                                      <p><a class="text-capitalize
                                      " href="<?php echo e(route('seeTeam',$team->name)); ?>"><?php echo e($team->name); ?></a></p>
                                  </header>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      <?php endif; ?>
                  </div>
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              <div id="overlay"></div>
          </article>
        </div>


        <article id="gallery">

            <header>
                <a href="<?php echo e(route('viewGallery')); ?>">
                    <h2><i class="fa fa-image"></i> Gallery</h2>
                </a>

            </header>
            <div id="yellow-separator"></div>
            <p>
                Memories of past events...
            </p>

        </article>
        <div id="event-preview" class="row">
            <div class="">
                <div id="preview" class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                    <div id="box">
                        <a href="<?php echo e(route('viewGallery')); ?>">
                            <img src="<?php echo e(asset('images/IMG_20170222_070926.jpg')); ?>" class="img-responsive" >
                            <div id="more-photos"> <i class="fa fa-image"></i></div>
                        </a>

                    </div>

                    <header><h4>Photos</h4></header>
                </div>
                <div id="preview" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div id="box">
                        <a href="<?php echo e(route('viewGallery')); ?>">
                            <img src="<?php echo e(asset('images/IMG_20170222_070951.jpg')); ?>" class="img-responsive" >
                            <div id="more-videos"> <i class="fa fa-play-circle-o"></i> </div>
                        </a>

                    </div>
                    <h4 class="blue">Videos</h4>


                </div>
            </div>

            
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">

    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>