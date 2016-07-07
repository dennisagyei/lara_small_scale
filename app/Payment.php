<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Payment extends Moloquent
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at','paydate'];

    
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
