<?php $__env->startSection('title','Team Overview:Player'); ?>
<?php $__env->startSection('content'); ?>

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('allTeams')); ?>"> Teams</a></li>
            <li class="breadcrumb-item"> <a href="<?php echo e(route('viewTeam',$team->name)); ?>"><?php echo e($team->name); ?></a> </li>
            <li class="breadcrumb-item active"><?php echo e($staff->fname.''.$staff->lname); ?></li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Team Overview</h2>
                <div id="separator"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <?php if($staff->image==''): ?>
                            <img src="<?php echo asset('images/user.jpg'); ?>" class="img-responsive">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/team/'.$staff->image)); ?>" class="img-responsive">
                        <?php endif; ?>
                        <h4><?php echo e($staff->fname.' '.$staff->lname); ?></h4>
                            <ul class="list-unstyled">
                                <li>Position: <span><?php echo e($staff->position); ?></span></li>
                                <li> <?php echo e($staff->description?$staff->description:''); ?></li>
                            </ul>
                    </div>

                    <div class="col-sm-7">
                        <a href="<?php echo e(route('editStaff',[$team->name,$staff->id])); ?>" id="editStaff" class="btn btn-warning"><i class="fa fa-edit"></i> Edit </a>
                        <a href="<?php echo e(route('deleteStaff',[$team->name,$staff->id])); ?>" id="removeStaff" class="btn btn-danger"><i class="fa fa-remove"></i> Remove</a>
                    </div>
                </div>
            </header>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removeStaff').on('click',function(){
                if(confirm('Are you sure you want to remove this staff ')==false){
                    return false;
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>