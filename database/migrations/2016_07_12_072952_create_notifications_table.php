<?php

//use Illuminate\Database\Schema\Blueprint;
use Jenssegers\Mongodb\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $collection) {
            $collection->increments('_id');
            $collection->string('sender');
            $collection->string('recipient');
            $collection->string('subject');
            $collection->string('message');
            $collection->string('status');
            $collection->string('category');
            $collection->string('user_id');

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
        Schema::drop('notifications');
    }
}
