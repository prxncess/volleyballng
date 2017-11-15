<?php $__env->startSection('title'); ?>
    <?php echo e('Volleyball.ng Update '.$team->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="vb-team-edit">

        <div class="well well" id="admin-box">

            <header>
                <h2><i class="fa fa-hand-paper-o"></i>Team Information</h2>
                <div id="separator"></div>
                <?php if(session('res')): ?> <div class="alert alert-success alert-dismissable"><?php echo e(session('res')); ?></div> <?php endif; ?>
            </header>

            <form class="form-horizontal" method="post" >
                <?php echo e(csrf_field()); ?>

                <div class="">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Name</label>
                            <input type="text" class="form-control" disabled value="<?php echo e($team->name); ?>" id="team-name" name="teamName" PLACEHOLDER="Team Name">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Contact</label>
                            <input type="text" class="form-control" value="<?php echo e($team->contact); ?>" id="team-contact" name="teamContact" PLACEHOLDER="Team Email">
                            <p class="error"><?php if($errors->has('teamContact')): ?> <?php echo e($errors->first('teamContact')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="<?php echo e($team->phone); ?>" id="team-phone" name="teamPhone" PLACEHOLDER="team mobile Number">
                            <p class="error"><?php if($errors->has('teamPhone')): ?> <?php echo e($errors->first('teamPhone')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control" name="teamDescription"><?php echo e($team->description); ?></textarea>
                            <p class="error"><?php if($errors->has('teamDescription')): ?> <?php echo e($errors->first('teamDescription')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Password</label>
                            <input type="password" class="form-control"  id="team-password" name="password">
                            <p class="error"><?php if($errors->has('password')): ?> <?php echo e($errors->first('password')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Password Confirm</label>
                            <input type="password" class="form-control"  id="password-confirm" name="password_confirmation">
                            <p class="error"><?php if($errors->has('password_confirmation')): ?> <?php echo e($errors->first('password_confirmation')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminTeam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>