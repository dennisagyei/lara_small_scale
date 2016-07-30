<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Member;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$members=Member::all();

    	return view('members.index',compact('members'));
    }

    public function edit($id)
    {
    	$member=Member::find($id);

    	return view('members.edit',compact('member'));
    }

    public function store(Request $request)
    {
    	//return $request->all();
    	$this->validate($request, [
        'company' => 'required',
        'registration_no' => 'required',
        'contact_person' => 'required',
        'contact_phone' => 'required',
        'email' => 'email',
   		 ]);

    	$member=new Member;

    	$member->company=$request->company;
    	$member->registration_no=$request->registration_no;
    	$member->registration_date=$request->registration_date;
    	$member->contact_person=$request->contact_person;
    	$member->contact_phone=$request->contact_phone;
    	$member->email=$request->email;
    	$member->address=$request->address;
    	$member->district=$request->district;
    	$member->member_type=$request->member_type;
    	$member->member_status=$request->member_status;
    	$member->epa_permit_no=$request->epa_permit_no;
    	$member->epa_expiry_date=$request->epa_expiry_date;
    	$member->mining_license=$request->mining_license;
    	$member->mining_expiry_date=$request->mining_expiry_date;
    	$member->operating_license=$request->operating_license;
    	$member->oper_expiry_date=$request->oper_expiry_date;
    	$member->user_id = Auth::user()->_id;
    	
    	$member->save();
		
    	return redirect('/members')->with('member_msg', 'New member created successfully!');
    }

    public function update($id,Request $request)
    {
    	//dd($id);
    	//return $request->all();
    	
    	$member=Member::find($id);

    	$member->company=$request->company;
    	$member->registration_no=$request->registration_no;
    	$member->registration_date=$request->registration_date;
    	$member->contact_person=$request->contact_person;
    	$member->contact_phone=$request->contact_phone;
    	$member->email=$request->email;
    	$member->address=$request->address;
    	$member->district=$request->district;
    	$member->member_type=$request->member_type;
    	$member->member_status=$request->member_status;
    	$member->epa_permit_no=$request->epa_permit_no;
    	$member->epa_expiry_date=$request->epa_expiry_date;
    	$member->mining_license=$request->mining_license;
    	$member->mining_expiry_date=$request->mining_expiry_date;
    	$member->operating_license=$request->operating_license;
    	$member->oper_expiry_date=$request->oper_expiry_date;

    	$member->save();

    	return redirect('/members')->with('member_msg', 'Member updated successfully!');

    }

    public function destroy($id)
    {
    	$member=Member::find($id);
    	$member->delete();

    	return redirect('/members')->with('member_msg', 'Member deleted!');

    }

    public function confirm($id)
    {
        $member=Member::find($id);

        return view('members.delete',compact('member'));

    }

    public function newMember()
    {
    	return view('members.new');
    }

}
