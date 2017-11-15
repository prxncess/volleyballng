<div class="modal fade" role="dialog" aria-labelledby="MyModalLabel" id="seeTeamImage" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row"></div>
                @if($team->team_image!=null)
                    {{--display team image--}}
                    <img src="{{asset('images/team/group/'.$team->team_image)}}" class="img-responsive">
                    @else
                <p>No image uploaded yet, <a href="{{route('teamUpdate')}}">click here</a> to upload</p>
                    @endif

            </div>
        </div>
    </div>
</div>
