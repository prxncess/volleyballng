<?php $__env->startSection('title','Gallery'); ?>
<?php $__env->startSection('content'); ?>

    <section id="Gallery">
        <header >
            <h2>Gallery</h2>
            <div id="yellow-separator"></div>
            
        </header>
        <div id="media" class="row">
            <?php $__currentLoopData = $videoList->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if(isset($item->id->videoId)): ?>
                    <div class=" col-md-6 col-sm-6">
                        <div class="youtube-video">
                            <iframe width="400" height="300" src="https://www.youtube.com/embed/<?php echo e($item->id->videoId); ?>" frameborder="0" allowfullscreen></iframe>
                            <h4><?php echo e($item->snippet->title); ?></h4>
                        </div>
                    </div>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>