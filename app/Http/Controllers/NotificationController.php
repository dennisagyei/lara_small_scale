<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;
use App\User;
use Mail;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showEmail()
    {
    	return view('notifications.email');
    }

    public function showSms()
    {
    	return view('notifications.sms');
    }

    public function composeEmail()
    {
    	$members=Member::all();

    	return view('notifications.compose_email',compact('members'));
    }

    public function sendEmail(Request $request)
    {
    	
    	//dd( $request);
    	//return $request->all();

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

            $message->cc($cc_email);

            $message->subject($title);

        });
		
		}

        //return response()->json(['message' => 'Request completed']);
        return redirect('/notifications/email/send')->with('mail_status', 'Your email was sent successfully!');;

    }
}
