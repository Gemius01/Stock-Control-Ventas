<?php

use Illuminate\Database\Seeder;
use App\User;

class RootUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'USUARIO ROOT',
	        'email' => 'stockroot@hotmail.com',
	        'password' => '$2y$10$wUG7gTKRnpQ2rB0Ehdu/qubJoiqWwnF1yjoQOMP.jea0h8wVgF1Xe', // iniaroot
	        //'remember_token' => str_random(10),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
