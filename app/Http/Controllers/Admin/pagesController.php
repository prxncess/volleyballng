<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Flash;
use App\Team;
class pagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }

    public function home(){
        \Session::flash('flash_message','Welcome back'); //<--FLASH MESSAGE
        $teams=Team::all();
        return view('admin.dashboard',compact('teams'));
    }
}
