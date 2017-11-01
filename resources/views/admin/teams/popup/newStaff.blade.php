<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="add-manager" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body">
                <div class="res">

                </div>
                <form method="post" id="member-info" action="" class="playerForm">
                    <input type="hidden" name="index" id="teamindex" value="{{$team->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <fieldset>

                        <h4> New Staff</h4>
                        <div id="res"></div>

                        <div id="add-player">

                            <div id="member-info">
                                <div class="" id="manager-img">
                                    <img src="{!! asset('images/user.jpg') !!}" id="show-img">
                                    <button type="button" >
                                        upload image
                                    </button>
                                    {{--<l class="fa fa-plus"></l>--}}
                                    <input type="file" name="manager_photo" id="manager-photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                                    <p class="error"></p>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <input type="text" class="form-control" id="manager-fname" value="" name="manager-fname" placeholder=" Staff first name">
                                            <p class="error"></p>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control" id="manager-lname" name="manager-lname" placeholder=" Staff Last name">
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <div id="separator"></div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <select class="form-control" id="staffPosition" name="position">
                                                <option value="">Select position</option>
                                                <option value="coach">Coach</option>
                                                <option value="manager">Manager</option>
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <div id="separator"></div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea name="staffDescription"  id="staffDescription" class="form-control"></textarea>
                                            <p class="error"></p>
                                        </div>
                                    </div>

                                </div>
                                <div id="separator"></div>


                            </div>
                        </div>
                        <input type="reset" hidden>
                        <button type="button" value="managerInfo" id="vb-button" class="addStaff btn btn-default">save</button>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</div>
