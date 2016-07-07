<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Concession;
use App\Member;

class ConcessionController extends Controller
{
    //
    public function index()
    {
    	$concessions=Concession::all();

    	return view('concessions.index',compact('concessions'));
    }

    public function edit($id)
    {
    	$concession=Concession::find($id);
        $members=Member::all();

        preg_match_all('/\((.*?)\)/', $concession->map_coords, $matches);
        $coords= $matches[1];

        //var_dump($coords);
    	return view('concessions.edit',compact('concession','members','coords'));
    }

    public function store(Request $request)
    {
    	
        /*
        return $request->all();
    	
        $this->validate($request, [
        'company' => 'required',
        'registration_no' => 'required',
        'contact_person' => 'required',
        'contact_phone' => 'required',
        'email' => 'email',
   		 ]);
        */
    	$concession=new Concession;

    	$concession->member_id=$request->member_id;
    	$concession->size=$request->size;
    	$concession->location=$request->location;
    	$concession->zone=$request->zone;
    	$concession->status=$request->status;
    	$concession->owner_type=$request->owner_type;
    	$concession->map_coords=$request->map_coords;
    	//$member->user_id=Auth::id();

    	$concession->save();
		
    	return redirect('/concessions');
        
    }

    public function update($id,Request $request)
    {
    	//dd($id);
    	//return $request->all();
    	
    	$concession=Concession::find($id);

    	$concession->member_id=$request->member_id;
        $concession->size=$request->size;
        $concession->location=$request->location;
        $concession->zone=$request->zone;
        $concession->status=$request->status;
        $concession->owner_type=$request->owner_type;
        $concession->map_coords=$request->map_coords;

    	$concession->save();

    	return redirect('/concessions');

    }

    public function destroy($id)
    {
    	$concession=Concession::find($id);
    	$concession->delete();

    	return redirect('/concessions');

    }

    public function confirm($id)
    {
        $concession=Concession::find($id);

        return view('concessions.delete',compact('concession'));

    }

    public function show()
    {
        $members=Member::all();

    	return view('concessions.new',compact('members'));
    }
}
