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
                <?php if(session('res') && session('res')=='updated'): ?><div class="center-block alert alert-success"><?php echo e(session('res')); ?></div> <?php endif; ?>
                <div class="row">
                    <div class="col-sm-5">
                        <img src="<?php echo e(asset('images/team/players/'.$player->player_image)); ?>" class="img-responsive">
                        <h4><?php echo e($player->fname.' '.$player->lname); ?></h4>
                        <ul class="list-unstyled">
                            <li>Position: <span><?php echo e($player->position); ?></span></li>
                            <li>Height: <span><?php echo e($player->height); ?></span></li>
                            <li>Age: <span>Not available</span></li>
                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <form class="form-horizontal" id="editPlayer" method="post" action="" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="player_image" id="player-image" class="form-control">
                                        <p class="error"><?php if($errors->has('player_image')): ?> <?php endif; ?> <?php echo e($errors->first('player_image')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="row">

                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="player-fname" value="<?php echo e($player->fname); ?>" name="player_firstName" placeholder="first name">
                                        <p class="error"><?php if($errors->has('player_firstName')): ?> <?php endif; ?> <?php echo e($errors->first('player_firstName')); ?></p>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="player-lname" value="<?php echo e($player->lname); ?>" name="player_lastName" placeholder="Last name">
                                        <p class="error"><?php if($errors->has('player_lastName')): ?> <?php endif; ?> <?php echo e($errors->first('player_lastName')); ?></p>
                                    </div>
                                </div>

                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Position</label>

                                        <select name="player_position" id="player-position" class="form-control">
                                            <option value="">select one</option>
                                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if(strtolower($position)==$player->position): ?>
                                                    <option value="<?php echo e($player->position); ?>" selected><?php echo e($player->position); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($position); ?>"><?php echo e($position); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </select>
                                        <p class="error"><?php if($errors->has('player_position')): ?> <?php endif; ?> <?php echo e($errors->first('player_position')); ?></p>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Height</label>
                                        <input type="text" class="form-control" id="player-height" value="<?php echo e($player->height); ?>" name="player_height" placeholder="height">
                                        <p class="error"><?php if($errors->has('player_height')): ?> <?php endif; ?> <?php echo e($errors->first('player_height')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="" class="btn btn-primary register-player">Update</button>
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
            $('a#removePlayer').on('click',function(){
                if(confirm('Are you sure you want to remove this player ')==false){
                    return false;
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>