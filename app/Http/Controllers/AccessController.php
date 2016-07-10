<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

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
    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) 
    	{
        	return redirect('/home');
   		} 
   		else 
   		{
        	return view('auth.login');
    	}
    }

    public function register(Request $request)
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
        'password' => 'required|confirmed|min:6',
   		 ]);


        $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->status='Pending';

		$user->save();

    	 return redirect('/auth/login');
    }

    public function showRegister()
    {
    	return view('auth.register');
    }


}
