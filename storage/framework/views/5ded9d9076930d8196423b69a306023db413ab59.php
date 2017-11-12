<?php $__env->startSection('title','All Teams- volleyBall.ng'); ?>
<?php $__env->startSection('content'); ?>

    <section id="allTeams">
        <div class="well well" id="admin-box">
            <header>
                <h3>Teams</h3>
                <div id="separator"></div>
                <a href="<?php echo e(route('addTeam')); ?>" class=" btn btn-purple "><i class="fa fa-plus right-5"></i> New team</a>
            </header>
            <?php if($teams->isNotEmpty()): ?>
                
                <div class="row top-20" id="team">
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="col-md-6 co-xs-12 col-lg-6 col-sm-6">
                            <a href="<?php echo e(route('viewTeam',$team->name)); ?>">
                            <img src="<?php echo e(asset('images/ball.png')); ?>">
                            <h4 class="text-center text-capitalize"><?php echo e($team->name); ?> </h4>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
                <?php else: ?>
                
                <div class="alert alert-warning alert-dismissable">No teams yet - click the 'New team' button to get started</div>
            <?php endif; ?>
            <div class="center-block">
                <?php echo e($teams->links()); ?>

            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>