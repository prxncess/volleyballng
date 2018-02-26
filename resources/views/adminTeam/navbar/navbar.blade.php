<nav id="team-menu" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><img src="{{asset('images/seu2.png')}}"> </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown" id="notifyTm">
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="badge">{{count(auth('team')->user()->unreadNotifications)}}</span> <i class="fa fa-envelope"></i> <b class="caret"></b></a>

            <ul  class="dropdown-menu message-dropdown">
                @if(count(auth('team')->user()->unreadNotifications )>0)
                @foreach(auth('team')->user()->unreadNotifications as $notification)
                    <li class="message-preview">
                        <a href="{{$notification->data['action']}}">
                            {!! $notification->data['message'] !!}
                        </a>
                    </li>
                    @endforeach

                @else
                    <p> no notification at the moment</p>
                @endif
                {{--<li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>--}}
            </ul>
        </li>
       {{-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>--}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group"></i> {{auth('team')->user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('changePassword')}}"><i class="fa fa-fw fa-user"></i> Edit Password</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{route('teamSignOut')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="team-sidebar" class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{route('teamDashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{route('overview')}}" {{--data-toggle="collapse" data-target="#team"--}}><i class="fa fa-fw fa-group"></i> Team <i class="fa fa-fw fa-caret-down"></i></a>
                {{--<ul id="team" class="collapse">
                    <li>
                        <a href="{{route('teamPlayers')}}"> <i class="fa fa-fw fa-users"></i> Players</a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-fw fa-user-circle-o"></i> Staff</a>
                    </li>
                </ul>--}}
  {{--          </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#event"><i class="fa fa-fw fa-calendar"></i> Event <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="event" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#history"><i class="fa fa-fw fa-ellipsis-h"></i> History <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="history" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#stat"><i class="fa fa-area-chart"></i> Stats <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="stat" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>--}}

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
