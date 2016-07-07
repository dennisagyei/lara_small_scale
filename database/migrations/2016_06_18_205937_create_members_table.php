<?php

//use Illuminate\Database\Schema\Blueprint;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $collection) {
            $collection->increments('_id');
            $collection->string('company');
            $collection->string('registration_no');
            $collection->string('registration_date');
            $collection->string('address');
            $collection->string('contact_person');
            $collection->string('contact_phone');
            $collection->string('email');
            $collection->string('district');
            $collection->string('member_type');
            $collection->string('member_status');
            $collection->string('epa_permit_no');
            $collection->string('mining_license');
            $collection->string('operating_license');
            $collection->string('expiry_date');
            $collection->softDeletes();
            $collection->timestamps();
            $collection->ipAddress('visitor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
