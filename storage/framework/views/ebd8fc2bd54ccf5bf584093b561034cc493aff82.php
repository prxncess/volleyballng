;
<?php $__env->startSection('title','Teams'); ?>
<?php $__env->startSection('content'); ?>

    <section id="Teams">

        <header id="container">
            <h3>Teams</h3>
            <div id="yellow-separator"></div>
            
        </header>
        <div id="events-subnav">
            <a href="<?php echo e(route('viewTeams')); ?>" class="active">Teams</a>
            <a href="<?php echo e(route('register')); ?>">Register a team</a>
            <a href="<?php echo e(route('teamSignIn')); ?>">Team Login</a>
        </div>
        
        <div id="vb-teams" class="container">
            <div class="row">
                
                <?php if(!empty($teams)): ?>
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div id="vb-team" class="col-xs-6 col-sm-4 col-md-2">
                        <a href="<?php echo e(route('seeTeam',$team->name)); ?>">
                            <?php if($team->logo==null): ?>
                                <img src="<?php echo e(asset('images/ball.png')); ?>" class="img-responsive">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/team/'.$team->logo)); ?>" class="img-responsive">
                            <?php endif; ?>
                            <h4 class="text-center"><?php echo e($team->name); ?></h4></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php else: ?>
                    <div class="col-sm-12">
                        <h4>Signing up in progress. Please Check back later</h4>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>