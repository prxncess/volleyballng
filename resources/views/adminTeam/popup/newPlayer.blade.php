<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-player" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row"></div>
                <h4 class="text-center">New Player</h4>
                <form method="post" id="member-info" action="" class="playerForm">
                    <input type="hidden" name="index" id="index" value="{{$team->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

                    <div class="text-center top-40" id="player-img">
                        <img src="{!! asset('images/user.png') !!}" id="show-player-img" class="center-block img-responsive">
                        <button type="button" class="btn top-20 bottom-20">Upload image</button>
                        <input type="file" name="player_image" id="player-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                        <p class="error"></p>
                    </div>
                    <div class="form-group text-center dark-gray"><label><i>Hint: Image size should be less than 1mb. <br> Click <a href="http://tinypng.com" target="_blank">here</a> to compress larger images.</i></label></div>


                    <div class="gray-separator top-20 bottom-20"></div>

                    <div class="form-group">
                        <label>Name</label>
                        <div class="row">

                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="player-fname" name="player_firstName" placeholder="First name">
                                <p class="error"></p>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="player-lname" name="player_lastName" placeholder="Surname">
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
                              <input type="radio" name="gender" id="gender" value="female">
                              Female
                            </label>
                          </div>
                          <div class="radio-inline">
                            <label>
                              <input type="radio" name="gender" id="gender" value="male">
                              Male
                            </label>
                          </div>
                            <p class="error"></p>
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
                                    <option value="Libero">Libero</option>
                                </select>
                                <p class="error"></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Height</label>
                                <!-- <input type="text" class="form-control" id="player-height" name="player_height" placeholder="height"> -->
                                <div class="row">
                                  <div class="col-xs-6">
                                    <select name="player_height_feet" id="player-height-feet" class="form-control">
                                        <option value="">(feet)</option>
                                        <option value="3 feet">3 feet</option>
                                        <option value="4 feet">4 feet</option>
                                        <option value="5 feet">5 feet</option>
                                        <option value="6 feet">6 feet</option>
                                        <option value="7 feet">7 feet</option>
                                        <option value="8 feet">8 feet</option>
                                    </select>
                                      <p class="error"></p>
                                  </div>
                                  <div class="col-xs-6">
                                    <select name="player_height_inches" id="player-height-inches" class="form-control">
                                        <option value="">(inches)</option>
                                        <option value="0 inches">0 inches</option>
                                        <option value="1 inch">1 inch</option>
                                        <option value="2 inches">2 inches</option>
                                        <option value="3 inches">3 inches</option>
                                        <option value="4 inches">4 inches</option>
                                        <option value="5 inches">5 inches</option>
                                        <option value="6 inches">6 inches</option>
                                        <option value="7 inches">7 inches</option>
                                        <option value="8 inches">8 inches</option>
                                        <option value="9 inches">9 inches</option>
                                        <option value="10 inches">10 inches</option>
                                        <option value="11 inches">11 inches</option>
                                    </select>
                                      <p class="error"></p>
                                  </div>
                                </div>
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
