<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Payment;
use App\Member;

class PaymentController extends Controller
{
    //
    public function index()
    {
    	$payments=Payment::all();

    	return view('payments.index',compact('payments'));
    }

    public function edit($id)
    {
    	$payment=Payment::find($id);
        $members=Member::all();


    	return view('payments.edit',compact('payment','members'));
    }

    public function store(Request $request)
    {
    	//return $request->all();
    	$this->validate($request, [
        'member_id' => 'required',
        'paydate' => 'required',
        'amount' => 'required',
        'ref_number' => 'required',
   		 ]);

    	$Payment=new Payment;

    	$Payment->amount=$request->amount;
    	$Payment->payment_methods=$request->payment_methods;
    	$Payment->payment_type=$request->payment_type;
    	$Payment->ref_number=$request->ref_number;
    	$Payment->paydate=$request->paydate;
    	$Payment->comments=$request->comments;
    	$Payment->member_id=$request->member_id;
    	//$Payment->user_id=Auth::id();

    	$Payment->save();
		
    	return redirect('/payments');
        
    }

    public function update($id,Request $request)
    {
    	//dd($id);
    	//return $request->all();
    	
    	$Payment=Payment::find($id);

    	$Payment->amount=$request->amount;
        $Payment->payment_methods=$request->payment_methods;
        $Payment->payment_type=$request->payment_type;
        $Payment->ref_number=$request->ref_number;
        $Payment->paydate=$request->paydate;
        $Payment->comments=$request->comments;
        $Payment->member_id=$request->member_id;

    	$Payment->save();

    	return redirect('/payments');

    }

    public function destroy($id)
    {
    	$Payment=Payment::find($id);
    	$Payment->delete();

    	return redirect('/payments');

    }

    public function confirm($id)
    {
        $payment=Payment::find($id);

        return view('payments.delete',compact('payment'));

    }

    public function newPayment()
    {
        $members=Member::all();

    	return view('payments.new',compact('members'));
    }
}
