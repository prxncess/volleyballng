<?php $__env->startSection('title','Team Overview:Player'); ?>
<?php $__env->startSection('content'); ?>

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('allTeams')); ?>"> Teams</a></li>
            <li class="breadcrumb-item"> <a href="<?php echo e(route('viewTeam',$team->name)); ?>"><?php echo e($team->name); ?></a> </li>
            <li class="breadcrumb-item active"><?php echo e($player->fname.''.$player->lname); ?></li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Team Overview</h2>
                <div id="separator"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <img src="<?php echo e(asset('images/team/players/'.$player->player_image)); ?>" class="img-responsive">
                        <h4><?php echo e($player->fname.' '.$player->lname); ?></h4>
                    </div>
                    <div class="col-sm-7">
                        <ul class="list-unstyled">
                            <li>Position: <span><?php echo e($player->position); ?></span></li>
                            <li>Height: <span><?php echo e($player->height); ?></span></li>
                            <li>Age: <span>Not available</span></li>
                        </ul>
                        <a href="<?php echo e(route('editPlayer',[$team->name,$player->id])); ?>" id="editPlayer" class="btn btn-warning"><i class="fa fa-edit"></i> Edit </a>
                        <a href="<?php echo e(route('deletePlayer',[$team->name,$player->id])); ?>" id="removePlayer" class="btn btn-danger"><i class="fa fa-remove"></i> Remove</a>
                    </div>
                </div>
            </header>
            </div>

    </section>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removePlayer').on('click',function(){
                if(confirm('Are you sure you want to remove this player ')==false){
                    return false;
                }
            })
        })
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>