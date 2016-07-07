<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Concession extends Moloquent
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
