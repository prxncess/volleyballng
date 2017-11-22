<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-manager" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-close"></span></button>
            </div>
            <div class="modal-body">
                <div id="res"></div>
                <h4 class="text-center">New Staff</h4>
                <form method="post" id="member-info" action="" class="playerForm top-40">
                    <input type="hidden" name="index" id="teamindex" value="{{$team->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <fieldset>

                        <div id="add-player">

                            <div id="member-info">
                                <div class="text-center" id="manager-img">
                                    <img src="{!! asset('images/user.png') !!}" id="show-img" class="center-block img-responsive">

                                      <button type="button" class="btn top-20 bottom-20">Upload image</button>
                                    {{--<l class="fa fa-plus"></l>--}}
                                    <input type="file" name="manager_photo" id="manager-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                                    <p class="error"></p>
                                </div>
                                <div class="form-group text-center dark-gray"><label><i>Hint: Image size should be less than 1mb. <br> Click <a href="http://tinypng.com" target="_blank">here</a> to compress larger images.</i></label></div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <input type="text" class="form-control text-capitalize" id="manager-fname" value="" name="manager-fname" placeholder="Ladi">
                                            <p class="error"></p>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control text-capitalize" id="manager-lname" name="manager-lname" placeholder="Okpere">
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div id="separator"></div> -->
                                <div class="form-group">
                                    <label>Position</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <select class="form-control" id="managerPosition" name="position">
                                                <option value="">Select position</option>
                                                <option value="coach">Coach</option>
                                                <option value="manager">Manager</option>
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div id="separator"></div> -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea name="staffDescription"  id="staffDescription" class="form-control"></textarea>
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div id="separator"></div> -->


                            </div>
                        </div>
                    </fieldset>

                </form>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <div class="col-sm-12">
                      <button type="button" value="managerInfo" id="vb-button" class="addStaff btn btn-default">Save</button>
                      <input type="reset"  hidden >
                  </div>

              </div>
            </div>
        </div>
    </div>
</div>
