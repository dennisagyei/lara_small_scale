<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
//use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Userlog extends Moloquent
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
