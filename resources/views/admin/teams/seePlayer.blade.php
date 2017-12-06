@extends('admin.layout')
@section('title')
    {{'Player overview'}}
    @endsection

@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('allTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item"> <a id="prTeam" href="{{route('viewTeam',$team->name)}}">{{$team->name}}</a> </li>
            <li class="breadcrumb-item active">{{$player->fname.''.$player->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Player Overview</h2>
                <div id="separator"></div>
                <div class="row" id="">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div id="prInfo">
                            <img src="{{asset('images/team/players/'.$player->player_image)}}" class="img-responsive">
                            <h4 class="text-capitalize">{{$player->fname.' '.$player->lname}}</h4>

                            <div class="gray-separator top-20 bottom-20"></div>

                            <ul class="list-unstyled">
                                <li><b>Position</b>: <span class="text-capitalize">{{$player->position}}</span></li>
                                <li><b>Height</b>: <span>{{$player->feet.' '.$player->inches}}</span></li>
                                <li><b>Gender</b>: <span>{{$player->gender}}</span></li>
                            </ul>
                        </div>

                        <div class="gray-separator top-20 bottom-20"></div>
                        <button class="btn btn-purple bottom-20 right-10" id="prPlayer"><i class="fa fa-print"></i> Player Slip </button>
                        <a href="{{route('updatePlayer',[$player->id])}}" id="editPlayer" class="btn btn-purple bottom-20 right-10"><i class="fa fa-edit"></i> Edit </a>
                        <a href="{{route('removePlayer',[$player->id])}}" id="removePlayer" class="btn btn-purple bottom-20"><i class="fa fa-remove"></i> Remove</a>
                    </div>
                    <div class="col-sm-3"></div>
                    <!-- <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7">
                    </div> -->
                </div>
            </header>
            </div>

    </section>

    @endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removePlayer').on('click',function(){
                if(confirm('Are you sure you want to remove this player ')==false){
                    return false;
                }
            })
            $('#prPlayer').on('click',function(){
               printContent('prInfo')
            })
            function PrintPlayer(elem)
            {
                var mywindow = window.open('', 'player slip', 'height=900,width=700');
                mywindow.document.write('<html><head><title></title>');
                mywindow.document.write('<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="print"/> ');
                mywindow.document.write('<link rel="stylesheet" href="css/admin.css" type="text/css" media="print"/> ');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1> Volleyball.ng Team ' + document.querySelector('#prTeam').innerHTML  + ' Player Overview</h1>');
                mywindow.document.write(elem);
                mywindow.document.write('</body></html>');

                //mywindow.document.close(); // necessary for IE >= 10
                setTimeout(function(){mywindow.print();},1000);
               // mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            }
            function printContent(el){
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
        })
    </script>
    @endsection