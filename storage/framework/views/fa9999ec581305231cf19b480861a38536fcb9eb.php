<?php $__env->startSection('title','volleyball events'); ?>;
<?php $__env->startSection('content'); ?>

    <div id="ad-Events" class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item-active">Events</li>
        </ol>

        <div class="well well" id="admin-box">
            <header>
                <h3 class="text-center"><i class="fa fa-paperclip"></i> Event</h3>
                <div id="" class="purple-separator top-10 bottom-20"></div>
                <a href="<?php echo e(route('createEvent')); ?>" class="float-right btn btn-purple bottom-10"><i class="fa fa-plus"></i> New event</a>
            </header>
            <?php if(session('res')): ?>
            <div class="alert alert-danger"><?php echo e(session('res')); ?></div>
            <?php endif; ?>
            <?php if($events->isEmpty()): ?>
                <div class="alert alert-warning">No events yet. Watch this space, or create an event!</div>
                <?php else: ?>
                
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo e(asset('images/event/'.$event->image)); ?>" style="width: 80px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo e($event->title); ?></h4>
                        
                    </div>
                    <div class="media-bottom">
                        <p class=""><?php echo e($event->description); ?></p>
                        <ul class="list-unstyled list-inline">
                            <li><i class=""></i><strong>Loaction:</strong> <span><?php echo e($event->e_location); ?></span> </li>
                            <li><i class=""></i><strong>Organizer:</strong> <span><?php echo e($event->e_organizer); ?></span> </li>
                            <li><i class=""></i><strong>Contact:</strong> <span><?php echo e($event->e_email); ?></span> </li>
                        </ul>
                        <p>
                            <a href="<?php echo e(route('showEvent',$event->slug)); ?>" class="right-10"><i class="fa fa-ellipsis-h right-5"></i> More</a>
                            <a href="<?php echo e(route('editEvent',$event->slug)); ?>" class="right-10"><i class="fa fa-edit right-5"></i>Edit</a>
                        </p>

                    </div>
                    <div id="separator"></div>
                </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
            <div class="center-block">
                <?php echo e($events->links()); ?>

            </div>

        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>