@extends('organizer.layout')
@section('Organizer Dashboard')

  @section('content')
      <div class="well well" id="admin-box">
          <header>
              @if(session('res'))
                  <div class="alert alert-danger">{{session('res')}}</div>
              @endif
              <h2>Dashboard</h2>
              <div id="separator"></div>
          </header>
          <div class="row dark-gray">
              <div class="col-sm-4">
                  <div class="panel panel-default">
                      <div class="panel-body text-center">
                          <h2>{{$organizer->events()->count()}}</h2>
                          <h5>My Events</h5>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="panel panel-default">
                      <div class="panel-body text-center">
                          <h2>0</h2>
                          <h5>Upcoming event</h5>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="panel panel-default">
                      <div class="panel-body text-center">
                          <h2>2</h2>
                          <h5>Pending Events</h5>
                      </div>
                  </div>
              </div>
          </div>

          <div class="gray-separator top-20 bottom-20"></div>

          <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#approval-requests" aria-controls="approval-requests" role="tab" data-toggle="tab">Events</a></li>
                  <li role="presentation"><a href="#upcoming-events" aria-controls="upcoming-events" role="tab" data-toggle="tab">My upcoming events</a></li>
                  <li role="presentation"><a href="#registered-teams" aria-controls="registered-teams" role="tab" data-toggle="tab">Team Request approval</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content top-20 dark-gray">
                  <div role="tabpanel" class="tab-pane active" id="approval-requests">
                      <table class="table table-responsive">
                          <tbody>
                          <tr>
                              <th>Title</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                          @foreach($organizer->events as $event)
                              <tr>
                                  <td><a href="" class=""><b>{{$event->title}}</b></a></td>
                                  <td>{{$event->status}}</td>
                                  <td><a href="{{route('upEvent',$event->slug)}}"><i class="fa fa-edit"></i></a></td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="upcoming-events">
                      <table class="table table-responsive">
                          <tbody>
                          <tr>
                              <th>Title</th>
                              <th>Start date</th>
                              <th>End date</th>
                          </tr>
                          <tr>
                              <td><a href="" class=""><b>Shell copa 2018</b></a></td>
                              <td>2017-4-10</td>
                              <td>2017-4-17</td>
                          </tr>
                          <tr>
                              <td><a href="" class=""><b>MTN grand smash</b></a></td>
                              <td>2017-1-10</td>
                              <td>2017-1-17</td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="registered-teams">
                      <table class="table table-responsive">
                          <tbody>
                          <tr>
                              <th>Team name</th>
                              <th>Request date</th>
                          </tr>

                          <tr>
                              <td><a href="" class=""><b>Shell spikers</b></a></td>
                              <td>2017-1-10</td>

                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>

          </div>
      </div>
      @endsection