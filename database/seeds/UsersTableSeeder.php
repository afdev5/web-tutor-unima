<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        	 'name' => 'Administrator', 
             'email' => 'admin@mail.com', 
             'password' => bcrypt('admin'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
