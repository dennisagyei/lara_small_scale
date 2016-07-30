<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Builder;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function userlog()
    {
        $userlogs=Userlog::all();
        return view('reports.userlog',compact('userlogs'));
    }
    
    public function exportlog()
    {
        $userlogs = Userlog::all();

        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        //$csv->insertOne(DB::getSchemaBuilder()->getColumnListing('userlogs'));
        $csv->insertOne(['User name', 'Login Date', 'Machine Name','Login IP']);
        foreach ($userlogs as $log) {
            $csv->insertOne([$log->user->name,$log->created_at,$log->machine,$log->ip]);
        }

        $csv->output('Export-userlog.csv');
        
    }
}
