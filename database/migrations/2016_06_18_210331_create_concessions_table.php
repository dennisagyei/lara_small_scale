<?php

//use Illuminate\Database\Schema\Blueprint;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concessions', function (Blueprint $collection) {
            $collection->increments('_id');
            $collection->string('member_id');
            $collection->string('location');
            $collection->string('size');
            $collection->string('zone');
            $collection->string('status');
            $collection->string('owner_type');
            $collection->string('map_coords');
            $collection->softDeletes();
            $collection->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concessions');
    }
}
