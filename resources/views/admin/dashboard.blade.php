@extends('admin.layout')
@section('title','Dashboard')
@section('content')

<div class="well well" id="admin-box">
  <header>
      <h2>Dashboard</h2>
      <div id="separator"></div>
  </header>
  <div class="row dark-gray">
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>0</h2>
          <h5>Team Approval </h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>{{$events->where('status','review')->count()}}</h2>
          <h5>Event approval</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>1</h2>
          <h5>Upcoming event</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>{{$teams->count()}}</h2>
          <h5>Registered teams</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="gray-separator top-20 bottom-20"></div>

  <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#approval-requests" aria-controls="approval-requests" role="tab" data-toggle="tab">Team approval</a></li>
      <li role="presentation"  ><a href="#event-approval" aria-controls="event-approval" role="tab" data-toggle="tab">Event approval</a></li>
      <li role="presentation"><a href="#upcoming-events" aria-controls="upcoming-events" role="tab" data-toggle="tab">Upcoming events</a></li>
      <li role="presentation"><a href="#registered-teams" aria-controls="registered-teams" role="tab" data-toggle="tab">Registered teams</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content top-20 dark-gray">
      <div role="tabpanel" class="tab-pane active" id="approval-requests">
        <table class="table table-responsive">
          <tbody>
            <tr>
              <th>Team name</th>
              <th>Request date</th>
            </tr>
            <tr>
              <td><a href="" class=""><b>City Spikers</b></a></td>
              <td>23.11.2017</td>
            </tr>
            <tr>
              <td><a href="" class=""><b>Shell Spikers</b></a></td>
              <td>22.11.2017</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div role="tabpanel" class="tab-pane " id="event-approval">
        <table class="table table-responsive">
          <tbody>
          <tr>
            <th>Team name</th>
            <th>Organizer</th>
            <th>Request date</th>
          </tr>
          @foreach($events->where('status','review') as $value)
            <tr>
              <td><a href="{{route('showEvent',[$value->slug])}}" class=""><b>{{$value->title}}</b></a></td>
              <td><a href="" class=""><b>{{$value->organizer[0]->organizer}}</b></a></td>
              <td>{{date('d.m.Y',strtotime($value->updated_at))}}</td>
            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
      <div role="tabpanel" class="tab-pane" id="upcoming-events">...</div>
      <div role="tabpanel" class="tab-pane" id="registered-teams">
        
      </div>
    </div>

  </div>
</div>
    @endsection
