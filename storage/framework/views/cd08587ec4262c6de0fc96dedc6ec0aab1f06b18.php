<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-player" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body">
                <div class="row"></div>
                <h4>New Player</h4>
                <form method="post" id="member-info" action="" class="playerForm">
                    <input type="hidden" name="index" id="index" value="<?php echo e($team->id); ?>">
                    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="" id="player-img">
                        <img src="<?php echo asset('images/user.jpg'); ?>" id="show-player-img">
                        <button type="button" >
                            Upload image
                        </button>

                        <input type="file" name="player_image" id="player-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">

                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="player-fname" name="player_firstName" placeholder="Chinenye">
                                <p class="error"></p>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="player-lname" name="player_lastName" placeholder="Onyegbule">
                                <p class="error"></p>
                            </div>
                        </div>

                    </div>
                    <div id="yellow-separator"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Position</label>
                                <select name="player_position" id="player-position" class="form-control">
                                    <option value="">select one</option>
                                    <option value="right side mitter">Rightside mitter</option>
                                    <option value="outside mitter">Outside mitter</option>
                                    <option value="middle block">Middle Block</option>
                                    <option value="sitter">sitter</option>
                                    <option value="opposite">opposite</option>
                                    <option value="Middle Block/Libero">Middle Block/Libero</option>

                                </select>
                                <p class="error"></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Height</label>
                                <input type="text" class="form-control" id="player-height" name="player_height" placeholder="height">
                                <p class="error"></p>
                            </div>
                        </div>
                    </div>
                    <div id="yellow-separator"></div>
                    


                </form>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <div class="col-sm-12">
                      <button type="button" id="register-players" class="btn vb-button">Register Player</button>
                      <input type="reset"  hidden >
                  </div>

              </div>
            </div>
        </div>
    </div>
</div>
