<nav id="admin-menu"class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle vb-navbar" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <!-- <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> -->
            <span>MENU</span>
            <i class="fa fa-bars fa-2x fa-fw"><span class="sr-only">toggle navigation</span></i>
        </button>
        <a class="navbar-brand" href="index.html"><img src="{{asset('images/seu2.png')}}"></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown" id="">
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="badge">{{count(auth('organizer')->user()->unreadNotifications)}}</span> <i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul  class="dropdown-menu message-dropdown">
                @if(count(auth('organizer')->user()->unreadNotifications )>0)
                    @foreach(auth('organizer')->user()->unreadNotifications as $notification)
                        <li class="message-preview">
                            <a href="{{$notification->data['action']}}">
                                {!! $notification->data['message'] !!}
                            </a>
                        </li>
                    @endforeach
                    <div><a href="#" id="notifyOg">Clear all notifications</a> </div>
                @else
                    <p> no notification at the moment</p>
                @endif

            </ul>
        </li>
        <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
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
                </li>
            </ul>
        </li> -->
        <!-- <li class="dropdown">
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
        </li> -->

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth('organizer')->user()->organizer}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <!-- <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li> -->
                <li>
                    <a href="{{route('opassword')}}"><i class="fa fa-fw fa-power-off"></i>Change password</a>
                    <a href="{{route('oLogout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>


    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="admin-sidebar" class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{route('organizerDashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-paper-plane"></i> My Events <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="{{route('ogNewEvent')}}">Add Events</a>
                    </li>
                    <li>
                        <a href="{{route('myEvents')}}">view Events</a>
                    </li>
                </ul>
            </li>
            {{--<li>
                <a href="javascript:;" data-toggle="collapse" data-target="#teamNav"><i class="fa fa-fw fa-users"></i> Teams <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="teamNav" class="collapse">
                    <li>
                        <a href="{{route('allTeams')}}">Manage Teams</a>
                    </li>
                    <li>
                        <a href="{{route('addTeam')}}">Create Team</a>
                    </li>
                </ul>
            </li>--}}

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
