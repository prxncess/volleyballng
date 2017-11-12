<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <div class="navbar-brand"> <img src="images/seu2.png"></div>
        <button id="toggle-bar" type="button" data-target="#volleymenu">
            <span class="sr-only">toggle navigation</span>
            <span class=""></span>
            <span class=""></span>
            <span class=""></span>
        </button>
    </div>
    <div  id="volleymenu">
        <ul id="menu-list">
            <a href=""  id="close"><i class="fa fa-close"></i> </a>
            <li class=""><a href="{{route('home')}}">Home</a> </li>
            <li class=""><a href="{{route('events')}}">Events</a> </li>
            <li class=""><a href="{{route('viewTeams')}}">Teams</a> </li>
            <li class=""><a href="{{route('viewGallery')}}">Gallery</a> </li>
            <img src="{{asset('images/seu2.png')}}">
        </ul>
    </div>

</nav>