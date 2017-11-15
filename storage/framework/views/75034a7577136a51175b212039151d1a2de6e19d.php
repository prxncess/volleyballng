<?php $__env->startSection('title'); ?>
    <?php echo e('change password'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="updatePassword">
        <div id="admin-box" class="well well">
            <header>
                <h3>Change Password</h3>
                <div id="separator"></div>
                <?php if(session('res')): ?> <div class="alert alert-success alert-dismissable"><?php echo e(session('res')); ?></div> <?php endif; ?>
            </header>
            <form method="post" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Password</label>
                            <input type="password" class="form-control"  title="password" id="team-password" name="password">
                            <p class="error"><?php if($errors->has('password')): ?> <?php echo e($errors->first('password')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Confirm password</label>
                            <input type="password" class="form-control" title="confirm password"  id="password-confirm" name="password_confirmation">
                            <p class="error"><?php if($errors->has('password_confirmation')): ?> <?php echo e($errors->first('password_confirmation')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn vb-button">Update</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminTeam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>