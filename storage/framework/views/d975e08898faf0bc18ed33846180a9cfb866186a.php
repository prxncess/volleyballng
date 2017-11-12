<?php $__env->startSection('title','Team Overview:staff'); ?>
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
                <?php if(session('res') && session('res')=='updated'): ?><div class="center-block alert alert-success"><?php echo e(session('res')); ?></div> <?php endif; ?>
                <?php if(session('error')): ?><div class="center-block alert alert-danger"><?php echo e(session('error')); ?></div> <?php endif; ?>
                <div class="row">
                    <div class="col-sm-5">
                        <img src="<?php echo e(asset('images/team/'.$staff->image)); ?>" class="img-responsive">
                        <h4><?php echo e($staff->fname.' '.$staff->lname); ?></h4>
                        <ul class="list-unstyled">
                            <li>Position: <span><?php echo e($staff->position); ?></span></li>
                            <li><p><?php echo e($staff->description); ?></p></li>

                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <form class="form-horizontal" id="editstaff" method="post" action="" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="staff_image" id="staff-image" class="form-control">
                                        <p class="error"><?php if($errors->has('staff_image')): ?> <?php endif; ?> <?php echo e($errors->first('staff_image')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="row">

                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="staff-fname" value="<?php echo e($staff->fname); ?>" name="staff_firstName" placeholder="first name">
                                        <p class="error"><?php if($errors->has('staff_firstName')): ?> <?php endif; ?> <?php echo e($errors->first('staff_firstName')); ?></p>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="staff-lname" value="<?php echo e($staff->lname); ?>" name="staff_lastName" placeholder="Last name">
                                        <p class="error"><?php if($errors->has('staff_lastName')): ?> <?php endif; ?> <?php echo e($errors->first('staff_lastName')); ?></p>
                                    </div>
                                </div>

                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Position</label>

                                        <select name="staff_position" id="staff-position" class="form-control">
                                            <option value="">select one</option>
                                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if(strtolower($position)==$staff->position): ?>
                                                    <option value="<?php echo e($staff->position); ?>" selected><?php echo e($staff->position); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($position); ?>"><?php echo e($position); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </select>
                                        <p class="error"><?php if($errors->has('staff_position')): ?> <?php endif; ?> <?php echo e($errors->first('staff_position')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Description</label>
                                        <textarea id="staff_description" name="staff_description" class="form-control"><?php echo e($staff->description); ?></textarea>
                                        <p class="error"><?php if($errors->has('staff_height')): ?> <?php endif; ?> <?php echo e($errors->first('staff_height')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="" class="btn btn-primary register-staff">Update</button>
                                    <input type="reset"  hidden >
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </header>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removestaff').on('click',function(){
                if(confirm('Are you sure you want to remove this staff ')==false){
                    return false;
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>