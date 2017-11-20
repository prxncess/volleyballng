<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-player" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="row"></div>
                <h4 class="text-center">New Player</h4>
                <form method="post" id="member-info" action="" class="playerForm">
                    <input type="hidden" name="index" id="index" value="{{$team->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <div class="top-40 text-center" id="player-img">
                        <img src="{!! asset('images/user.png') !!}" id="show-player-img">
                        <p class="top-20">
                          <button type="button" class="btn btn-purple">Upload image</button>
                        </p>

                        <input type="file" name="player_image" id="player-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error"></p>
                    </div>
                    <div class="form-group top-40">
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

                    <!-- <div class="gray-separator top-20 bottom-20"></div> -->

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <div><label>Gender</label></div>
                          <div class="radio-inline">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                              Female
                            </label>
                          </div>
                          <div class="radio-inline">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                              Male
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="gray-separator top-20 bottom-20"></div> -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Position</label>
                                <select name="player_position" id="player-position" class="form-control">
                                    <option value="">Select one</option>
                                    <option value="right side hitter">Right side hitter</option>
                                    <option value="outside hitter">Outside hitter</option>
                                    <option value="middle block">Middle blocker</option>
                                    <option value="setter">Setter</option>
                                    <option value="opposite">Opposite hitter</option>
                                    <option value="libero">Libero</option>
                                    <option value="substitute">Substitute</option>
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
                      <button type="button" id="register-players" class="btn vb-button">Save</button>
                      <input type="reset"  hidden >
                  </div>

              </div>
            </div>
        </div>
    </div>
</div>
