<?php $__env->startSection('title','Create Event'); ?>;
<?php $__env->startSection('content'); ?>

    <section id="updateEvent">
        <div id="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Events')); ?>"> events</a></li>
                <li class="breadcrumb-item active"><?php echo e($event->title); ?></li>
            </ol>
            <div class="well well" id="admin-box">
                <header>
                    <h3><i class="fa fa-plus"></i> Update event</h3>
                    <div id="separator"></div>
                </header>

                <form method="post" class="form-horizontal" enctype="multipart/form-data" id="event-form">
                    <?php echo e(csrf_field()); ?>

                    
                    <?php if(session('status') && session('status')=='updated'): ?>
                        <div class="alert alert-success"> Event updated successfully created </div>
                    <?php endif; ?>
                    <h5><i class="fa fa-file-text-o"></i> Event information</h5>
                    <div id="separator"></div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <label>Event Title</label>
                            <input type="text" class="form-control" placeholder="event title" value="<?php echo e($event->title); ?>" id="event-title" name="event_title">
                            <p class="error"><?php if($errors->has('event_title')): ?> <?php echo e($errors->first('event_title')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Location</label>
                            <select name="event_location" id="event-loaction" class="form-control">
                                <option value="">Select event location</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($event->e_location==$state): ?>
                                    <option value="<?php echo e($event->e_location); ?>" selected=""><?php echo e($event->e_location); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($state); ?>"><?php echo e($state); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            <p class="error"><?php if($errors->has('event_location')): ?> <?php echo e($errors->first('event_location')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <label>Event poster</label>
                            <input type="file" class="form-control" placeholder="" id="event-poster" name="event_poster">
                            <p class="error"><?php if($errors->has('event_poster')): ?> <?php echo e($errors->first('event_poster')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-6">
                            <label>Start date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd"   value="<?php echo e($event->start_date); ?>" id="event-start" name="event_start">
                            <p class="error"><?php if($errors->has('event_start')): ?> <?php echo e($errors->first('event_start')); ?> <?php endif; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <label>End date</label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd"  id="event-end"  value="<?php echo e($event->end_date); ?>" name="event_end">
                            <p class="error"><?php if($errors->has('event_end')): ?> <?php echo e($errors->first('event_end')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Event description</label>
                            <textarea class="form-control" name="event_description"  id="event_info" cols="75" rows="5"><?php echo e($event->description); ?></textarea>
                            <p class="error"><?php if($errors->has('event_description')): ?> <?php echo e($errors->first('event_description')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <h5><i class="fa fa-address-book-o"></i> Organizers Information</h5>
                    <div id="separator"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Organizers Name</label>
                            <input type="text" class="form-control" placeholder="Event Organizer"  value="<?php echo e($event->e_organizer); ?>" id="event-organizer" name="event_organizer">
                            <p class="error"><?php if($errors->has('event_organizer')): ?> <?php echo e($errors->first('event_organizer')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-7">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="event_email"  value="<?php echo e($event->e_email); ?>" name="event_email">
                            <p class="error"><?php if($errors->has('event_email')): ?> <?php echo e($errors->first('event_email')); ?> <?php endif; ?></p>
                        </div>
                        <div class="col-sm-5">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="phone" id="event_phone"  value="<?php echo e($event->e_phone); ?>" name="event_phone">
                            <p class="error"><?php if($errors->has('event_phone')): ?> <?php echo e($errors->first('event_phone')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <select class="form-control" name="event_status">
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($statu==$event->status): ?>
                                        <option value="<?php echo e($event->status); ?>" selected><?php echo e($event->status); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($statu); ?>" ><?php echo e($statu); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            </select>
                            <p class="error"><?php if($errors->has('event_status')): ?> <?php echo e($errors->first('event_status')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default">update</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>
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
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>