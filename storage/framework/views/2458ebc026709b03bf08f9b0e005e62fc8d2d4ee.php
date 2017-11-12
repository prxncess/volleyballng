<?php $__env->startSection('title','Players'); ?>
<?php $__env->startSection('content'); ?>
    <section id="viewPlayers">
        <header id="container">
            <h2>Players</h2>
            <div id="yellow-separator"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('viewTeams')); ?>"> Teams</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('seeTeam',$team->name)); ?>"> <?php echo e($team->name); ?></a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
        </header>

        <div id="players">

            <div class="row">
                <?php if(!empty($players)): ?>
                    <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo e(route('viewPlayer',$player->id)); ?>"> <img src="images/team/players/<?php echo e($player->player_image); ?>" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <a href="<?php echo e(route('viewPlayer',$player->id)); ?>"> <h4 class="media-heading"><?php echo e($player->fname.' '.$player->lname); ?></h4></a>
                                <ul class="list-unstyled">
                                    <li><span class="role">Position: </span> <strong><?php echo e($player->position); ?></strong> </li>
                                    <li><span class="role">Height: </span> <strong><?php echo e($player->height); ?></strong> </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                    <?php else: ?>
                <?php endif; ?>

            </div>

        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>