<?php $__env->startSection('title','Teams'); ?>
<?php $__env->startSection('content'); ?>

    <section id="viewTeam">
        <header id="container">
            <h2>Team</h2>
            <div id="yellow-separator"></div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('viewTeams')); ?>"> Teams</a></li>
            <li class="breadcrumb-item active"><?php echo e($team->name); ?></li>
        </ol>
        </header>
        <section id="container">
            <h3 class="text-uppercase text-center">Team profile</h3>
            <div id="yellow-separator"></div>
            <div id="team=profile">
                <?php if($team->team_image==null): ?>
                    <img  id="team-image"src="images/team_logos/teamImage.jpg" class="img-responsive " >
                <?php else: ?>
                    <img src="<?php echo e(asset('images/team/group/'.$team->team_image)); ?>" class="img-responsive center-block">
                <?php endif; ?>

                <div id="team-data">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.
                        Ergo hoc quidem apparet, nos ad agendum esse natos. Quid enim de amicitia statueris utilitatis causa expetenda vides. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Itaque eos id agere, ut a se dolores, morbos, debilitates repellant.
                        Ergo hoc quidem apparet, nos ad agendum esse natos. Quid enim de amicitia statueris utilitatis causa expetenda vides.
                    </p>
                </div>
                <div id="team-staff">
                    <div class="row" id="container">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h3 class="text-uppercase text-center">Coach</h3>
                            <div id="yellow-separator"></div>
                            <?php if($teamCoach): ?>
                            <div class="media">
                                <div class="media-left">
                                    <?php if($teamCoach->image==''): ?>
                                        <img src="<?php echo asset('images/user.jpg'); ?>" class="media-object">
                                    <?php else: ?>
                                        <img src="images/team/<?php echo e($teamCoach->image); ?>" class="media-object">
                                    <?php endif; ?>

                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo e($teamCoach->fname.' '.$teamCoach->lname); ?></h4>
                                    <p><?php echo e($teamCoach->description); ?></p>
                                </div>
                            </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6" id="staffs">
                            <h3 class="text-uppercase text-center">Staff</h3>
                            <div id="yellow-separator">
                                <ul class="list-inline">
                                    <li><span class="role">Team manager</span>
                                    <strong><?php if($teamManager): ?>)<?php echo e($teamManager->fname.' '.$teamManager->lname); ?> <?php endif; ?></strong>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo e(route('viewPlayers',$team->name)); ?>" class="btn btn-primary">View Players</a>
        </section>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>