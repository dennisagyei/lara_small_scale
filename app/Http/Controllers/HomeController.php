<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Concession;
use App\Payment;
use App\Task;
use Illuminate\Support\Facades\Auth;

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
       
        $users= User::Where('status','=','Pending')->get();
        $tasks = Task::orderBy('created_at', 'asc')->take(5)->get();
        
        if (Auth::check() and Auth::user()->role=='District Admin')
        {
    	    $members=Member::where('district','=',Auth::user()->district)
    	                    ->orderBy('created_at', 'desc')->take(5)
    	                    ->get();
        } else {
            $members=Member::orderBy('created_at', 'desc')->take(5)->get();
        }
        
        if (Auth::check() and Auth::user()->role=='Member')
        {
            return view('layouts.member');
        }
        else
        {
            return view('home',compact('userCount','memberCount','concessionCount','Totalpayment','members','tasks','users'));
        }
        
    }
}
