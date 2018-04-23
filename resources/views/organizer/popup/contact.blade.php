<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="contact-organizer" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Contact event organizer</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="res"></div>
                <div class="row">

                    <form method="post">
                        <input type="hidden" value="{{csrf_token()}}" id="token">
                        <input type="hidden" value="{{$event->organizer[0]->id}}" name="index" id="index">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control bottom-40" placeholder="subject" name="mail-subject" id="mail-subject">
                                <p class="error"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control bottom-40" role="8" cols="70" name="mail-body" id="mail-body" placeholder="message"></textarea>
                                <p class="error"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="reset" hidden>
                                <button class="btn btn-purple" type="button" id="send-mail">Send</button>
                            </div>
                        </div>
                    </form>



                </div>

            </div>
        </div>
    </div>
</div>
