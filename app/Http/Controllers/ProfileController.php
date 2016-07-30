<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
    	return view('profile');
    }

    public function update(Request $request)
    {
        if ($request->user()) 
        {

        	//dd($request->user()->_id);
        	//dd($request);
        	
            $user=User::find($request->user()->_id);

            if ($request->name)
            {
                $user->name = $request->name;
            }

            if ($request->notify_email)
            {
			     $user->notify_email = $request->notify_email;
            }

            if ($request->phone)
            {
			     $user->phone = $request->phone;
			}

			if ($request->password)
			{
				$user->password = bcrypt($request->password);
			}

			$user->save();

	    	 return redirect('/home');
            // $request->user() returns an instance of the authenticated user...
        }
    }

}
