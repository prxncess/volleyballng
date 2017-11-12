<?php $__env->startSection('title'); ?>
    <?php echo e('Update team information'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="upTeamInfo">
        <div class="well well" id="admin-box">
            <form class="form-horizontal" method="post"   enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="">
                    <div class="" id="team-logo">
                        <img src="<?php echo asset('images/ball.png'); ?>" id="show-logo-img">
                        <button type="button" class="btn-purple" >
                            upload logo
                        </button>
                        
                        <input type="file" name="logo" id="logo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error"><?php if($errors->has('logo')): ?> <?php echo e($errors->first('logo')); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Team name</label>
                            <input type="text" class="form-control text-capitalize" disabled value="<?php echo e($team->name); ?>" id="team-name" name="teamName" PLACEHOLDER="the uyo checkers">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Contact</label>
                            <input type="text" class="form-control" value="<?php echo e($team->contact); ?>" id="team-contact" name="teamContact" PLACEHOLDER="tuc@volleyball.ng">
                            <p class="error"><?php if($errors->has('teamContact')): ?> <?php echo e($errors->first('teamContact')); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="<?php echo e($team->phone); ?>" id="team-phone" name="teamPhone" PLACEHOLDER="08021234567">
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
                            <label>Team image</label>
                            <i>Please upload a group image of your entire team</i>
                            <input type="file" class="form-control" name="team_image" id="team-img" placeholder="Team image">
                            <p class="error"><?php if($errors->has('team_image')): ?> <?php echo e($errors->first('team_image')); ?> <?php endif; ?></p>
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
<?php $__env->startSection('footer-scripts'); ?>
    <script type="text/javascript">
        //member-img
        $('div#team-logo button').on('click',function(){
            $('#logo').click();
        })
        $('#logo').on('change',function(e){
            showfile(this,'div#team-logo img#show-logo-img')
        })
        function showfile(fileInput,img,showName){
            if(fileInput.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $(img).attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
                $(showName).text(fileInput.files[0].name);
            }
        }
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('adminTeam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>