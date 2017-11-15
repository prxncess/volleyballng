;
<?php $__env->startSection('title','Teams'); ?>
<?php $__env->startSection('content'); ?>

    <section id="Teams">

        <header id="container">
            <h3>Teams</h3>
            <div id="yellow-separator"></div>
        </header>
        
        <div id="vb-teams" class="container">
            <div class="row">
                <?php 
                $team_name=[1=>'Sharks','Rangers','Ballers','Glaziers','Black Cats','Chiefs','Orlandos','Pirates','Black Stars','Yorks'];
                 ?>
                <?php for($i=1; $i<=10;$i++): ?>
                <div id="vb-team" class="col-xs-6 col-sm-4 col-md-2">
                    <img src="images/team_logos/team<?php echo e($i); ?>.png" class="">
                    <h4 class="text-center"><a href=""> <?php echo e($team_name[$i]); ?></a></h4>
                </div>
                    <?php endfor; ?>

            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>