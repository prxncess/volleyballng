<?php

namespace App\Http\Controllers;
use App\Team;
use App\Player;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Event;
use Google_Client;
class PagesController extends Controller
{
    //
    public function index(){
        //get all events to are open
        try{
            $events=Event::whereStatus('open')->get();
            //return dd($events);
            $teams=Team::all()->take(6)->where('active',1);
            return view('index',compact('events','teams'));
        }catch (ModelNotFoundException $e){

        }


    }

    public function events(){
        // date calender
        $events=Event::where('status','open')->get();

        return view('event',compact('events'));
    }
    public function register(){
        return view('register');
    }
    public function event($slug){
        //find a given event
        try{
            $event=Event::where('slug',$slug)->where('status','open')->firstOrFail();
            return view('events.viewEvent',compact('event'));
        }catch (ModelNotFoundException $e){
            return view(404);
        }

    }
    public function teams(){
        $teams =Team::all()->where('active',1);
        return view('teams',compact('teams'));
    }
    //page not found
    public function notFound(){
        return view('404');
    }
    public function teamInfo($tea){
        //find the sent time
        try{
            $team=Team::whereName($tea)->firstOrFail();
            //return $team;
            $teamCoach=$team->staff->where('position','coach')->first();
            $teamManager=$team->staff->where('position','manager')->first();
            /*return $teamCoach->image;*/
            return view('team.team',compact('team','teamCoach','teamManager'));
        }catch (ModelNotFoundException $e){
            return route('notFound');
        }


    }
    public function players($name){
        try{
            //get the team
            $team=Team::whereName($name)->firstOrFail();
            //fetch player
            $players=Player::whereTeam_id($team->id)->paginate(9);
           // return $players;
            return view('team.players.players',compact('team','players'));
        }catch (ModelNotFoundException $e){
            return view('404');
        }

    }
    public function player($id){
        //find the player with id
        try{
            $player= Player::whereId($id)->firstOrFail();
            //find plyers team
            $team=Team::whereId($player->team_id)->firstOrFail();
            return view('team.players.player',compact('player','team'));
        }catch (ModelNotFoundException $e){
            return view('404');
        }

        //return $player;

    }
    public function gallery(){
        $API_key    = 'AIzaSyCcPTnN_UhdTv3E5HybcePCOFCmVS6_J8Y';
        $channelID  = 'UCJtovpDP8m3vIEISz4Wgn4A';
        $maxResults = 10;

        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
       // https://www.googleapis.com/youtube/v3/activities?part=snippet,contentDetails&channelId=UCJtovpDP8m3vIEISz4Wgn4A&key=AIzaSyCcPTnN_UhdTv3E5HybcePCOFCmVS6_J8Y

        return view('gallery',compact('videoList'));
    }
    public function events_calender(){
        $month= date('m');
        $year=date('Y');
        $day=date('d');

        $currentFirstdayMonth=date('N',strtotime($year."-".$month."-01"));
        $numberOfDaysInMonth=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $totalDaysOfMonthDisplay= ($currentFirstdayMonth==7)?($numberOfDaysInMonth):($numberOfDaysInMonth +$currentFirstdayMonth);
//number of box to display
        $boxToDisplay=($totalDaysOfMonthDisplay<=35)?35:42;
        $dayCount=1;
        $calender='';
        for($i=1;$i<=$boxToDisplay;$i++){
            if(($i>=$currentFirstdayMonth+1||$currentFirstdayMonth==7)&&($i<=$totalDaysOfMonthDisplay)){
                $eventDate=date('Y-m-'.$dayCount);
                $dayEvents=Event::where('status','open')->where('start_date','>',$eventDate)->get();
                dd($dayEvents);

                if($dayCount==date('d')){
                    $calender.=" <li class='active'  id='bd-day'>$dayCount</li>";
                }elseif($dayEvents->count()>0){
                    $calender.="<li class='' style='background: yellow' id='bd-day'>$dayCount</li>";

                }else{
                    $calender.=" <li class=''  id='bd-day'>$dayCount</li>";
                }

            }else{
                $calender.='<li class="" id=bd-day">&nbsp;</li>';
            }

            $dayCount++;

        }

        return view ('events.eventsCalender',compact('calender'));
    }



}
