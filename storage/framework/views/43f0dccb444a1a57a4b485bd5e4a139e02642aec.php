<?php $__env->startSection('title','Team'); ?>
<?php $__env->startSection('content'); ?>

    <section id="viewTeam" class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('allTeams')); ?>"> Teams</a></li>
            <li class="breadcrumb-item active"><?php echo e($team->name); ?></li>
        </ol>
        <div class="well well" id="admin-box">
            <header id=>
                <h2>Team</h2>
                <div id="separator"></div>
            </header>
            <section id="">
                <h3 class="text-uppercase text-center">Team profile</h3>
                <div id="yellow-separator"></div>
                <div id="team=profile">
                    <img  id="team-image"src="<?php echo e(asset('images/team_logos/teamImage.jpg')); ?>" class="img-responsive">
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
                                <div class="media">
                                    <div class="media-left">
                                        <img src="<?php echo e(asset('images/team/'.$teamCoach->image)); ?>" width="100px" class="media-object">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo e($teamCoach->fname.' '.$teamCoach->lname); ?></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque eos id agere, ut a se dolores, morbos,
                                            debilitates repellant. Ergo hoc quidem apparet, nos ad agendum esse natos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" id="staffs">
                                <h3 class="text-uppercase text-center">Staff</h3>
                                <div id="yellow-separator">
                                    <ul class="list-inline">
                                        <li><span class="role">Team manager</span>
                                            <strong><?php echo e($teamManager->fname.' '.$teamManager->lname); ?></strong>
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('seePlayers',$team->name)); ?>" id="vb-button" class="btn btn-primary">View Players</a>
                <a href="<?php echo e(route('deleteTeam',$team->name)); ?>" id="delete-team" class="btn btn-delete">Delete Team</a>
            </section>

        </div>


    </section>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete-team').on('click',function(){
                if(confirm('Are you sure you want to delete team  <?php echo e($team->name); ?>')==false){
                    return false;
                }
            })
        })
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>