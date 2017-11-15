<?php $__env->startSection('title','Create Team- volleyball.ng'); ?>
<?php $__env->startSection('content'); ?>
    <section id="ad-vd-addTeam">

        <div class="well well" id="admin-box">
            <header>
                <h2>Add Team</h2>
                <div class="" id="separator"></div>
            </header>
            <form method="post" class="form-horizontal" id="add-team">
                <?php echo e(csrf_field()); ?>

                <fieldset class="">
                    <div class="form-group">
                        <label>Name of team</label>
                        <input type="text" class="form-control" name="teamName" value="<?php echo e(old('teamName')); ?>" id="team-name" placeholder="Team name">
                        <p class="error"><?php if($errors->has('teamName')): ?> <?php echo e($errors->first('teamName')); ?><?php endif; ?> </p>
                    </div>
                    <div id="separator"></div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="teamContact" value="<?php echo e(old('teamContact')); ?>" id="team-contact" placeholder="email">
                        <p class="error"><?php if($errors->has('teamContact')): ?> <?php echo e($errors->first('teamContact')); ?><?php endif; ?></p>
                    </div><div id="separator"></div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="teamPhoneNumber" value="<?php echo e(old('teamPhoneNumber')); ?>" id="team-phone" placeholder="Phone number">
                        <p class="error"><?php if($errors->has('teamPhoneNumber')): ?> <?php echo e($errors->first('teamPhoneNumber')); ?><?php endif; ?></p>
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="vb-button" class="btn btn-primary" value="">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>