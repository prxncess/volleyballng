<?php $__env->startSection('extra-style'); ?>
    <link href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap-datepicker.standalone.min.css')); ?>" rel="stylesheet" type="text/css">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Events Calender'); ?>
<?php $__env->startSection('content'); ?>

    <aside id="container">
        <header> <h2 class="text-capitalize">Events</h2><div id="yellow-separator"></div> </header>

        <p>
            Check out our upcoming events, or register your own event!

        </p>

    </aside>
    <div id="events-subnav">
        <a href="<?php echo e(route('events')); ?>" >Events</a>
        <a href="<?php echo e(route('EventsCal')); ?>" class="">Calendar</a>
        <a href="<?php echo e(route('newEvent')); ?>" class="active">Register Event</a>
    </div>

    <section id="vb-event-form">
        <form method="post" class="form-horizontal" enctype="multipart/form-data" id="event-form">
            <?php echo e(csrf_field()); ?>

            <h2 class="text-center">Register an event</h2>
            
            <?php if(session('status') && session('status')=='success'): ?>
                <div class="alert alert-success">All done! Your event has been created and we'll get in touch as soon as it's approved. </div>
            <?php endif; ?>
            <h5><i class="fa fa-file-text-o right-10"></i> Event information (all fields required)</h5>
            <div id="yellow-separator"></div>
            <div class="form-group">

                <div class="col-sm-12">
                    <label>Event Title</label>
                    <input type="text" class="form-control" placeholder="event title" value="<?php echo e(old('event_title')); ?>" id="event-title" name="event_title">
                    <p class="error"><?php if($errors->has('event_title')): ?> <?php echo e($errors->first('event_title')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Location</label>
                    <select name="event_location" id="event-loaction" class="form-control">
                        <option value="">Select event location</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($v == old('event_location')): ?>
                            <option value="<?php echo e($v); ?>" selected><?php echo e($v); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($v); ?>"><?php echo e($v); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                    <p class="error"><?php if($errors->has('event_location')): ?> <?php echo e($errors->first('event_location')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-12">
                    <label>Event poster</label>
                    <input type="file" class="form-control" placeholder="" value="<?php if(null!==old('event_poster')): ?> <?php echo old('event_poster'); ?> <?php endif; ?>" id="event-poster" name="event_poster">
                    <p class="error"><?php if($errors->has('event_poster')): ?> <?php echo e($errors->first('event_poster')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-6">
                    <label>Start date</label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker"  value="<?php echo e(old('event_start')); ?>" id="event-start" name="event_start">
                    <p class="error"><?php if($errors->has('event_start')): ?> <?php echo e($errors->first('event_start')); ?> <?php endif; ?></p>
                </div>
                <div class="col-sm-6">
                    <label>End date</label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-provide="datepicker" id="event-end"  value="<?php echo e(old('event_end')); ?>" name="event_end">
                    <p class="error"><?php if($errors->has('event_end')): ?> <?php echo e($errors->first('event_end')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Event description</label>


                    <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5"><?php echo e(old('event_description')); ?></textarea>
                    <small><i>Not less than 50 characters</i></small>
                    <p class="error"><?php if($errors->has('event_description')): ?> <?php echo e($errors->first('event_description')); ?> <?php endif; ?></p>
                </div>
            </div>
            <h5><i class="fa fa-address-book-o"></i> Organizer's Information</h5>
            <div id="yellow-separator"></div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label>Organizer's Name</label>
                    <input type="text" class="form-control" placeholder="Event Organizer"  value="<?php echo e(old('event_organizer')); ?>" id="event-organizer" name="event_organizer">
                    <p class="error"><?php if($errors->has('event_organizer')): ?> <?php echo e($errors->first('event_organizer')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-7">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" id="event_email"  value="<?php echo e(old('event_email')); ?>" name="event_email">
                    <p class="error"><?php if($errors->has('event_email')): ?> <?php echo e($errors->first('event_email')); ?> <?php endif; ?></p>
                </div>
                <div class="col-sm-5">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="phone" id="event_phone"  value="<?php echo e(old('event_phone')); ?>" name="event_phone">
                    <p class="error"><?php if($errors->has('event_phone')): ?> <?php echo e($errors->first('event_phone')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-12">

                    <input type="checkbox" class="right-10" placeholder="" id="event-terms" name="event_terms"> I agree to the <a href="/terms"> terms & conditions</a>
                    <p class="error"><?php if($errors->has('event_terms')): ?> <?php echo e($errors->first('event_terms')); ?> <?php endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>

            </div>


        </form>
    </section>


    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript">
        $('#event-start').datepicker({
            format: 'yyyy-mm-dd',
        });
        $('#event-end').datepicker({
            format: 'yyyy-mm-dd',
        });

    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>