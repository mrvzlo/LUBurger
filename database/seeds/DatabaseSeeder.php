<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@luburger.lv',
			'password' => bcrypt('qweasd'),
			'phone' => '00000000000',
			'role' => 2,
		]);	
    	DB::table('users')->insert([
			'name' => 'John',
			'email' => 'Johnny@Gui.tar',
			'password' => bcrypt('qweasd'),
			'phone' => '12345654321',
		]);	
    }
}
