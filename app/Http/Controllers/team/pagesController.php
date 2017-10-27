<?php

namespace App\Http\Controllers\team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use Auth;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class pagesController extends Controller
{
    //
   // use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('team');
    }

    public function home(){
        return view('adminTeam.dashboard');
    }
}
