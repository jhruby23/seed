<?php

use Illuminate\Database\Seeder;

use App\Bid;
use Carbon\Carbon;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bid::create([
        		'item' => 1,
        		'offer' => 2,
        		'owner' => 1,
        		'buyer' => 2,
        		'date_completed' => Carbon::now(),
        		'success' => true
        ]);
        
        Bid::create([
        		'item' => 2,
        		'offer' => 3,
        		'owner' => 2,
        		'buyer' => 1,
        		'date_completed' => Carbon::now(),
        		'success' => false
        ]);
        
        Bid::create([
        		'item' => 3,
        		'offer' => 1,
        		'owner' => 1,
        		'buyer' => 1,
        		'date_completed' => NULL,
        		'success' => false
        ]);
        
        Bid::create([
        		'item' => 2,
        		'offer' => 1,
        		'owner' => 2,
        		'buyer' => 1,
        		'date_completed' => NULL,
        		'success' => false
        ]);
    }
}
