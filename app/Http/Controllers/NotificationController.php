<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;
use App\User;
use App\Notification;

use Mail;
use Illuminate\Support\Facades\Auth;

use SoapClient;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showEmail()
    {
    	$notifications=Notification::where('category','=','email')->where('user_id','=',Auth::id())->get();

    	return view('notifications.email',compact('notifications'));
    }

    public function showSms()
    {
    	$notifications=Notification::where('category','=','sms')->where('user_id','=',Auth::id())->get();

    	return view('notifications.sms',compact('notifications'));
    }

    public function composeEmail()
    {
    	$members=Member::all();

    	return view('notifications.compose_email',compact('members'));
    }

    public function composeSms()
    {
    	$members=Member::all();

    	return view('notifications.compose_sms',compact('members'));
    }

    public function sendEmail(Request $request)
    {
    	
    	$this->validate($request, [
        'to_email' => 'required',
        'subject' => 'required',
        'message' => 'required',
        'cc_email' => 'email',
   		 ]);

    	$recipients=$request->to_email;
    	$title=$request->subject;
    	$content=$request->message;
    	$cc_email=$request->cc_email;


    	foreach ($recipients as $recipient) {
    		
	    	Mail::queue('notifications.template1', ['title' => $title, 'content' => $content], function ($message) 
	        	use ($recipient,$title,$cc_email)
	        {

	            $message->from('info@smallscale.com', 'no-reply');

	            $message->to($recipient);

	           // $message->cc($cc_email);

	            $message->subject($title);

	        });
	        
		
		}

		//Save Email
		$notify=new Notification;

    	$notify->sender='GNASSM-MIS';
    	$notify->recipient=$request->to_email;
    	$notify->subject=$request->subject;
    	$notify->message=$request->message;
    	$notify->status='Sent';
    	$notify->category='email';
    	$notify->user_id=Auth::id();

    	$notify->save();
        //return response()->json(['message' => 'Request completed']);
        return redirect('/notifications/email/send')->with('mail_status', 'Your email was sent successfully!');;

    }

    public function sendSms(Request $request)
    {

    	$recipients=$request->recipients;


    	foreach ($recipients as $recipient) 
    	{	
    		$number='233'.substr($recipient,-9);

	    	$url = "http://api.mytxtbox.com/v3/messages/send?".
			 "From=GNASSM-MIS"
			 ."&To=$number"
			 ."&Content=".urlencode($request->message)
			 ."&ClientId=jphgfwqa"
			 ."&ClientSecret=apskecby"
			 ."&RegisteredDelivery=true"; 
			 $curl = curl_init();

			 curl_setopt_array($curl, array(
			 CURLOPT_URL => $url,
			 CURLOPT_RETURNTRANSFER => true,
			 CURLOPT_CUSTOMREQUEST => "GET",
			 ));

			 $response = curl_exec($curl);
			 $err = curl_error($curl);

			 curl_close($curl);
 		}

 		$sms_status=json_decode($response)->Status;


		if ($sms_status=='0'){
			$status_msg='Your sms was sent successfully';
		} elseif ($sms_status=='1'){
			$status_msg='The phone number recipient is not a valid phone number.';
		} elseif ($sms_status=='3'){
			$status_msg='The message body was too long.';
		} elseif ($sms_status=='4'){
			$status_msg='The message is not routable on the MYtxtBox gateway.';
		} elseif ($sms_status=='5'){
			$status_msg='The delivery time specified was not a valid time.';
		} elseif ($sms_status=='6'){
			$status_msg='The message content was rejected or is invalid.';
		}elseif ($sms_status=='100'){
			$status_msg='General invalid request.';
		}	

        return redirect('/notifications/sms/send')->with('sms_status', $status_msg);;


    }
}
