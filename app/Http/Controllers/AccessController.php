<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Userlog;
use Illuminate\Support\Facades\Auth;
use Mail;

class AccessController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
    	 Auth::logout();

    	 return redirect('/auth/login');

    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
         ]);

    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'status' => 'Active'])) 
    	{
    	    //log activity
    	    $userlog = new Userlog;
    		$userlog->ip = $_SERVER['REMOTE_ADDR'];
    		$userlog->machine = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $userlog->user_id = Auth::user()->_id;
    		$userlog->save();
    		
        	return redirect('/home');
   		} 
   		else 
   		{
            
        	return view('auth.login',['err_msg' => 'Invalid user or password!']);
    	}
    }

    public function register(Request $request)
    {
    

        $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
   		 ]);


        $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->status='Pending';
		$user->role='default';
        
        
		$user->save();
        
        return redirect('/auth/login')->with('status_msg', 'Your account has been created pending approval. Please check your mail!');
    	
    }

    public function showRegister()
    {
    	return view('auth.register');
    }

    public function showUsers()
    {
        
        $users=User::all();
        
        return view('auth.index',compact('users'));
    }
    
    public function findUsers(Request $request)
    {
        if ($request->search)
        {
            $username=$request->search;
        
            $users=User::where('name','like','%'.$username.'%')->get();
        } else
        {
            $users=User::all();
        }
        
        
        return view('auth.index',compact('users'));
    }
    
    public function storeUser(Request $request)
    {
    	/* User::create([
                    'name' => Request::get('name'),
                    'email' => Request::get('email'),
                    'password' => bcrypt(Request::get('password')),
        ]);
        */

        $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6',
   		 ]);


        $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone= $request->phone;
		$user->password = bcrypt($request->password);
		$user->status='Pending';
        $user->role=$request->role;
        $user->user_id = Auth::user()->_id;
        
		$user->save();

    	return redirect('/users');
    }
    
    public function update($id,Request $request)
    {
    	
        $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:255',
        
   		 ]);


        $user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
        $user->role=$request->role;
		
		if ($request->password)
		{
		    $user->password = bcrypt($request->password);
		}

		$user->save();

    	return redirect('/users');
    }
    
    public function edit($id)
    {
        $user=User::find($id);

    	return view('auth.edituser',compact('user'));
    }
    
    public function addUser()
    {
        return view('auth.adduser');
    }
    
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        
    	return redirect('/users');
    }
    
    public function disable($id)
    {
    
        $user = User::find($id);
		$user->status = 'InActive';
	
		$user->save();

    	return redirect('/users');
    }
    
    public function enable($id)
    {
    
        $user = User::find($id);
		$user->status = 'Active';
	    
		$user->save();
		
		$recipient=$user->email;
		$title='User Account Management';
		$cc_email='dennisgyei@gmail.com';
		$content= 'Your user account have been Approved. Please click the button below to activate. ';
		
		
			Mail::queue('notifications.accountactivation', ['title' => $title, 'content' => $content], function ($message) 
	        	use ($recipient,$title,$cc_email)
	        {

	            $message->from('info@smallscale.com', 'no-reply');

	            $message->to($recipient);

	            $message->cc($cc_email);

	            $message->subject($title);

	        });

    	return redirect('/users');
    }
    
    function getRealUserIp()
    {
      switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
}
