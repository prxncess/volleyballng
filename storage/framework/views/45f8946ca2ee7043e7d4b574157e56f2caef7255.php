<?php $__env->startSection('title'); ?>
    <?php echo $event->title; ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <article id="event">
        <header> <h2><?php echo e($event->title); ?></h2></header>
        <div id="media">
            <img src="images/event/<?php echo e($event->image); ?>" class="img-responsive center-block">
        </div>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Description</h3>
            <p>
                <?php echo e($event->description); ?>

            </p>
        </aside>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Date</h3>
            <span>Starting : <?php echo e(date('d F Y', strtotime($event->start_date))); ?> </span>
            <span>to: <?php echo e(date('d F Y', strtotime($event->end_date))); ?></span>
        </aside>
        <div id="yellow-separator"></div>
        <aside>
            <h3>Location</h3>
           
            <span><?php echo e($event->e_location); ?> State</span>
        </aside>
        <section id="sub-links">
            <ul class="list-unstyled list-inline">
                <li><a href="<?php echo route('teamSignIn'); ?>" class="btn btn-default">Register your team</a> </li>
                
            </ul>
        </section>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>