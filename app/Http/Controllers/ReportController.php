<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userlog;

class ReportController extends Controller
{
    public function userlog()
    {
        $userlogs=Userlog::all();
        return view('reports.userlog',compact('userlogs'));
    }
}
