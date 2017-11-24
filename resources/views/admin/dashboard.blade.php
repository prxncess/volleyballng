@extends('admin.layout')
@section('title','Dashboard')
@section('content')

<div class="well well" id="admin-box">
  <header>
      <h2>Dashboard</h2>
      <div id="separator"></div>
  </header>
  <div class="row purple">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>0</h2>
          <h5>Approval requests</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>1</h2>
          <h5>Upcoming event</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <h2>4</h2>
          <h5>Registered teams</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="gray-separator top-20 bottom-20"></div>
</div>
    @endsection
