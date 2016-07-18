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
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
         ]);

    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) 
    	{
        	return redirect('/home');
   		} 
   		else 
   		{
            
        	return view('auth.login',['err_msg' => 'Invalid user or password!']);
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
		
		If ($request->password)
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

    	return redirect('/users');
    }
}
