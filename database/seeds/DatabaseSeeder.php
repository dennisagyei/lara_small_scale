<?php

use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Illuminate\Database\Seeder;
use App\User;

//use database\seeds\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Moloquent::unguard();
        $this->call('UserTableSeeder');
    }
}


class UserTableSeeder extends Seeder {

   public function run()
   {
       DB::collection('users')->delete();

      /* User::create([
        'name'     => 'Dennis Agyei',
        'username' => 'dennisagyei',
        'email'    => 'dennisagyei@gmail.com',
        'password' => Hash::make('doreen')
       ]);
       */

       	$user = new User;
		$user->name = 'Dennis Agyei';
		$user->save();

   }
}