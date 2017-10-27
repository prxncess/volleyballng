<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }

    public function home(){
        return view('admin.dashboard');
    }
}
