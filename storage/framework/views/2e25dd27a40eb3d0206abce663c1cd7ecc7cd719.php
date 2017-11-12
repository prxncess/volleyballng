<?php $__env->startSection('title','Team player'); ?>
<?php $__env->startSection('content'); ?>
    <section id="viewPlayer">
        <header>
            <h3>Team</h3>
            <div id="yellow-separator"></div>
        </header>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('viewTeams')); ?>"> Teams</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('seeTeam',$team->name)); ?>"> <?php echo e($team->name); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('viewPlayers',$team->name)); ?>"> Players</a></li>
            <li class="breadcrumb-item active">Paul Martins</li>
        </ol>
        <aside>
            <div class="row">
                <div class="col-xs-12 col-sm-4  " id="player_image">
                     <img src="images/team/players/<?php echo e($player->player_image); ?>" class="media-object">
                </div>
                <div class=" col-xs-12 col-sm-4  " id="player_info">
                     <span class="media-heading"><?php echo e($player->fname.' '.$player->lname); ?></span>
                    <ul class="list-unstyled">
                        <li><span class="role">Position: </span> <strong><?php echo e($player->position); ?>r</strong> </li>
                        <li><span class="role">Height: </span> <strong><?php echo e($player->height); ?></strong> </li>

                    </ul>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </aside>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>