<?php $__env->startSection('title','Team Login'); ?>
<?php $__env->startSection('content'); ?>

        <header id="container">
            <h2>Team sign-in</h2>
            <div id="yellow-separator"></div>
        </header>
        <div id="events-subnav">
            <a href="<?php echo e(route('viewTeams')); ?>" >Teams</a>
            <a href="<?php echo e(route('register')); ?>">Register a team</a>
            <a href="<?php echo e(route('teamSignIn')); ?>" class="active">Team Login</a>
        </div>
    <section id="team-login">

        <form id="vb-team-login" method="post" action="<?php echo e(route('teamSignIn')); ?>" class="form-horizontal">
            <header> <h2 class="text-center"><i  class="fa fa-lock"></i></h2> </header>

            <?php echo e(csrf_field()); ?>

            <div class="row">
                <p  class=" text-center error"><?php if(session('message')): ?> <?php echo e(session('message')); ?> <?php endif; ?></p>
                <?php if(session('status')): ?>
                    <p class=" alert alert-danger text-center error">
                        <?php echo e(session('status')); ?>

                    </p>
                    <?php endif; ?>
                <?php if(session('res')): ?>
                    <p class=" alert alert-success text-center ">
                        <?php echo session('res'); ?>

                    </p>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="Team email">
                        <p class="error"><?php if($errors->has('email')): ?> <?php echo e($errors->first('email')); ?> <?php endif; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password"  id="password" placeholder="Team password">
                        <p class="error"><?php if($errors->has('password')): ?> <?php echo e($errors->first('password')); ?> <?php endif; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                       <button type="submit" id="vb-button" class="btn btn-primary">Login</button>
                </div>
            </div>

        </form>
    </section>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>