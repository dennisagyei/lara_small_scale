<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Notification extends Moloquent
{
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
