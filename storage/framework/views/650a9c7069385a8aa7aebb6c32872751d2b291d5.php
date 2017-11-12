<?php $__env->startSection('title','Players'); ?>
<?php $__env->startSection('content'); ?>
    <section id="viewPlayers">
        <header id="container">
            <h2>PLayers</h2>
            <div id="yellow-separator"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('viewTeams')); ?>"> Teams</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('viewTeam')); ?>"> Pirates</a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
        </header>

        <div id="players">

            <div class="row">
                <?php for($i=1;$i<=9;$i++): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo e(route('viewPlayer')); ?>"> <img src="images/team_logos/male.png" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <a href="<?php echo e(route('viewPlayer')); ?>"> <h4 class="media-heading">Martins Paula</h4></a>
                                <ul class="list-unstyled">
                                    <li><span class="role">Position: </span> <strong>Middle Blocker</strong> </li>
                                    <li><span class="role">Height: </span> <strong>200cm</strong> </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>

            </div>

        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>