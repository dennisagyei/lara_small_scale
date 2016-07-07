<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Member extends Moloquent
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at','registration_date','epa_expiry_date','mining_expiry_date','oper_expiry_date'];


    public function payments()
    {
    	return $this->hasMany('App\Payment');
    }

    public function concessions()
    {
    	return $this->hasMany('App\Concession');
    }
}
