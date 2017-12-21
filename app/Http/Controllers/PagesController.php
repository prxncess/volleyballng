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
            $teams=Team::all()->where('active',1)->take(6);
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
            $event=Event::where('slug',$slug)/*->where('status','open')*/->firstOrFail();
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
            $malePlayers=Player::whereTeam_id($team->id)->where('gender','male')->get();
            $femalePlayers=Player::whereTeam_id($team->id)->where('gender','female')->get();
            //return $femalePlayers;
            //return $femalePlayers;
           // return $players;
            return view('team.players.players',compact('team','malePlayers','femalePlayers'));
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
        //get all events wetin they given month
        //all get events available within the given date
        $currentFirstdayMonth=date('N',strtotime($year."-".$month."-01"));
        $numberOfDaysInMonth=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $totalDaysOfMonthDisplay= ($currentFirstdayMonth==7)?($numberOfDaysInMonth):($numberOfDaysInMonth +$currentFirstdayMonth);
//number of box to display
        $boxToDisplay=($totalDaysOfMonthDisplay<=35)?35:42;
        $dayCount=1;
        $calender='';
        $date_info=getdate(strtotime('first day of',mktime(0,0,0,$month,1,$year)));

        $days_of_week=array('sun','mon','tue','wed','thu','fri','sat');//days of the week
        //date of the week
        $day_of_week=$date_info['wday'];
        //dd($date_info);
       $calender.='<table id="cal" class="table table-striped">';
       $calender.='<caption id=""><span class="pull-left prev-month">
<i class="fa fa-chevron-left"></i></span><select class="month" name="month">';
        //get all months of the year
        for($m=1; $m<=12; ++$m){
            if(date('F', mktime(0, 0, 0, $m, 1))==$date_info['month']){
                $calender.='<option value="'.date('F', mktime(0, 0, 0, $m, 1)).'" selected>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>';
            }else{
                $calender.='<option value="'.date('F', mktime(0, 0, 0, $m, 1)).'">'.date('F', mktime(0, 0, 0, $m, 1)).'</option>';
            }

        }

        $calender.='</select> '.$year.'<span class="pull-right next-month"><i class="fa fa-chevron-right"></i></span></caption>';
        $calender.='<tr>';

        foreach($days_of_week as $day){
            $calender.='<th class="header">'.$day.'</th>';
        }
        $calender.='</tr><tr>';
        //check if first day of thr month fall on a sunday
        //add white space if not
        if($date_info['wday'] >0){
            $calender.='<td colspan="'.$day_of_week.'"></td>';
        }

        //current day
        $currentDay=1;
        $events='';
        while($currentDay<=$numberOfDaysInMonth){
            $date=strtotime(date($year."-".$month."-".$currentDay));
            //dd($date);
            $events=Event::where('start_date','<=',$date)->where('end_date','>=',$date)->get();
            //check if the days of the week is equal to 7
            if($day_of_week==7){
                $day_of_week=0;
                $calender.='</tr><tr>';
            }
            //output dates
            if($currentDay==date('d')){

                $calender.='<td class="day active ">'.$currentDay.'</td>';

            }else{
                $calender.='<td class="day ';
                if($events->count()>0){
                    $calender.=' has-event';
                }
                $calender.=' ">'.$currentDay.'</td>';
            }


            //increment of days
            $currentDay++;
            $day_of_week++;
        }
        if($day_of_week!=7){
            $rem_day=7-$day_of_week;
            $calender.='<td colspan="'.$rem_day.'"></td>';
        }
        //close row and calender
        $calender.='</tr></table>';
        //get the events of the current day
        $currentDay=strtotime(date('Y-m-d'));
        $currentEvents=Event::where('start_date','<=',$currentDay)->where('end_date','>=',$currentDay)->get();

        return view ('events.eventsCalender',compact('calender','currentEvents'));
    }



}
