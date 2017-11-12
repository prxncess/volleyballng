<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="seeTeamImage" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row"></div>
                <?php if($team->team_image!=null): ?>
                    
                    <img src="<?php echo e(asset('images/team/group/'.$team->team_image)); ?>" class="img-responsive">
                    <?php else: ?>
                <p>No Team Image Uploaded yet please <a href="<?php echo e(route('teamUpdate')); ?>">click</a>  here to upload</p>
                    <?php endif; ?>

            </div>
        </div>
    </div>
</div>
