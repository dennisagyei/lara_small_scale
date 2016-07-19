<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Concession;
use App\Payment;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount=User::count();
        $memberCount=Member::count();
        $concessionCount=Concession::count();
        $Totalpayment=Payment::sum('amount');
        $members=Member::orderBy('created_at', 'desc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();
        
        return view('home',compact('userCount','memberCount','concessionCount','Totalpayment','members','tasks'));
    }
}
