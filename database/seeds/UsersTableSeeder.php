<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		User::create([
            'name' => 'honzk',
            'email' => 'honzk860@gmail.com',
            'password' => bcrypt('majer'),
    		]);
    		
    		User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
    		]);
    }
}
