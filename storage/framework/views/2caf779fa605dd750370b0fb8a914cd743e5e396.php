<?php $__env->startSection('title','volleyball Event'); ?>
<?php $__env->startSection('content'); ?>

    <div id="show-event container" class="">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('Events')); ?>">Events</a> </li>
                <li class="breadcrumb-item-active"><?php echo e($event->title); ?></li>
            </ol>
        <div id="admin-box" class="well well">
            
            <?php if(session('status') && session('status')=='updated'): ?>
                <div class="alert alert-success">Event status has been updated</div>
            <?php endif; ?>
            <header>
                <h2>Overview</h2>
                <div id="separator"></div>
                <div id="ad-event-info" class="">
                    <img src="<?php echo e(asset('images/event/'.$event->image)); ?>" class="img-responsive">
                    <div class="row">
                        <div class="col-sm-5"><strong>Title</strong></div>
                        <div class="col-sm-7"><?php echo e($event->title); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Description</strong></div>
                        <div class="col-sm-7"><?php echo e($event->description); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Starting on:</strong> <?php echo e($event->start_date); ?></div>
                        <div class="col-sm-7"><strong>To end on: </strong><?php echo e($event->end_date); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Location</strong></div>
                        <div class="col-sm-7"><?php echo e($event->e_location); ?> state</div>
                    </div>
                    <h4><i class="fa fa-user"></i> Organizer information</h4>
                    <div id="separator"></div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Organizer</strong></div>
                        <div class="col-sm-7"><?php echo e($event->e_organizer); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Phone</strong></div>
                        <div class="col-sm-7"><?php echo e($event->e_phone); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>Email</strong></div>
                        <div class="col-sm-7"><?php echo e($event->e_email); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><strong>status</strong></div>
                        <div class="col-sm-7">
                            <form method="post" action="<?php echo e(route('showEvent',$event->slug)); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <select class="form-control" name="status">
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($statu==$event->status): ?>
                                                    <option value="<?php echo e($event->status); ?>" selected><?php echo e($event->status); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($statu); ?>" ><?php echo e($statu); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?php echo e(route('deleteEvent',$event->slug)); ?>" class="btn btn-danger " id="delete-event">Delete</a>
                        </div>
                    </div>

                </div>
            </header>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete-event').on('click',function(){
                if(confirm('Are you sure you to delete this event')==false){
                    return false;
                }
                //event.preventDefault();


            })
        })
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>