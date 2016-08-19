<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userlog;
use App\Member;
use App\Concession;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Builder;


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
    
    public function memberlist()
    {
        $members=Member::all();
        return view('reports.members',compact('members'));
        
    }
    
    public function export_memberlist()
    {
        $members = Member::all();

        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        //$csv->insertOne(DB::getSchemaBuilder()->getColumnListing('userlogs'));
        $csv->insertOne(['Company name', 'registration_no', 'registration_date','contact_person','contact_phone','email','address','district','member_type','member_status','epa_permit_no','epa_expiry_date','mining_license','mining_expiry_date']);
        foreach ($members as $report) {
            $csv->insertOne([$report->company,$report->registration_no,$report->registration_date,$report->contact_person,$report->contact_phone,$report->email,$report->address,$report->district,$report->member_type,$report->member_status,$report->epa_permit_no,$report->epa_expiry_date,$report->mining_license,$report->mining_expiry_date]);
        }

        $csv->output('Export-members.csv');
    }
    
    public function concessionlist()
    {
        $concessions= Concession::all();
        
        return view('reports.concessions',compact('concessions'));
    }
    
    public function export_concessionlist()
    {
        $concessions= Concession::all();

        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        //$csv->insertOne(DB::getSchemaBuilder()->getColumnListing('userlogs'));
        $csv->insertOne(['Company name', 'size', 'location','zone','status','owner_type']);
        foreach ($concessions as $report) {
            $csv->insertOne([$report->member->company,$report->size,$report->location,$report->zone,$report->status,$report->owner_type]);
        }

        $csv->output('Export-Concessions.csv');
    }
    
    public function paymentlist()
    {
        $payments=Payment::all();
        
        return view('reports.payments',compact('payments'));
    }
    
    public function export_paymentlist()
    {
        $payments=Payment::all();

        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        //$csv->insertOne(DB::getSchemaBuilder()->getColumnListing('userlogs'));
        $csv->insertOne(['Company name', 'ref_number', 'paydate','amount','payment_methods','comments']);
        foreach ($payments as $report) {
            $csv->insertOne([$report->member->company,$report->ref_number,$report->paydate,$report->amount,$report->payment_methods,$report->comments]);
        }

        $csv->output('Export-Payments.csv');
        
    }
}
