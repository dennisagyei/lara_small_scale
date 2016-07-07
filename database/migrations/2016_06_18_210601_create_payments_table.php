<?php

//use Illuminate\Database\Schema\Blueprint;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $collection) {
            $collection->increments('_id');
            $collection->decimal('amount', 15, 2);
            $collection->string('payment_methods');
            $collection->string('payment_type'); // Membership Fee/Annual GM Contribution
            $collection->string('ref_number');
            $collection->string('paydate');
            $collection->string('comments');
            $collection->string('member_id');
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
        Schema::drop('payments');
    }
}
