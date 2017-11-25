@extends('layout')
@section('title','Players')
@section('content')
    <section id="viewPlayers">
        <header id="container">
            <h2>Players</h2>
            <div id="yellow-separator"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('viewTeams')}}"> Teams</a></li>
                <li class="breadcrumb-item"><a href="{{route('seeTeam',$team->name)}}"> {{$team->name}}</a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
        </header>

        <div id="players">
          <div id="">
            <div class="top-40">

              <!-- Nav tabs -->
              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                  <ul class="nav nav-pills text-center" role="tablist">
                    <li role="presentation" class="active"><a href="#men" aria-controls="men" role="tab" data-toggle="tab">Men</a></li>
                    <li role="presentation"><a href="#women" aria-controls="women" role="tab" data-toggle="tab">Women</a></li>
                  </ul>
                </div>
                <div class="col-sm-4"></div>
              </div>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active top-40" id="men">
                  <div class="row">
                      @if(!empty($players))
                          @foreach($players as $player)

                          <div class="col-sm-6 col-md-4">
                              <div class="media">
                                  <div class="media-left">
                                      <a href="{{route('viewPlayer',$player->id)}}"> <img src="images/team/players/{{$player->player_image}}" class="media-object"></a>
                                  </div>
                                  <div class="media-body">
                                      <a href="{{route('viewPlayer',$player->id)}}"> <h4 class="media-heading">{{$player->fname.' '.$player->lname}}</h4></a>
                                      <ul class="list-unstyled">
                                          <li><span class="role">Position: </span> <strong>{{$player->position}}</strong> </li>
                                          <li><span class="role">Height: </span> <strong>{{$player->feet.' '.$player->inches}}</strong> </li>
                                      </ul>

                                  </div>
                              </div>

                          </div>
                          @endforeach

                          @else
                      @endif
                      {{$players->links()}}

                  </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="women">
                  <div role="tabpanel" class="tab-pane active top-40" id="men">
                    <div class="row">
                        @if(!empty($players))
                            @foreach($players as $player)

                            <div class="col-sm-6 col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('viewPlayer',$player->id)}}"> <img src="images/team/players/{{$player->player_image}}" class="media-object"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{route('viewPlayer',$player->id)}}"> <h4 class="media-heading">{{$player->fname.' '.$player->lname}}</h4></a>
                                        <ul class="list-unstyled">
                                            <li><span class="role">Position: </span> <strong>{{$player->position}}</strong> </li>
                                            <li><span class="role">Height: </span> <strong>{{$player->feet.' '.$player->inches}}</strong> </li>

                                        </ul>

                                    </div>
                                </div>

                            </div>
                            @endforeach

                            @else
                        @endif
                        {{$players->links()}}

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </section>
    @endsection

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- <script>
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script> -->
