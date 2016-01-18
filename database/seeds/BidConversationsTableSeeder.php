<?php

use Illuminate\Database\Seeder;

use App\BidConversation;

class BidConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		BidConversation::create([
    			'bid_id' => 1,
    			'writer' => 1,
    			'message' => 'Short message'
     		]);
     		
    		BidConversation::create([
    			'bid_id' => 1,
    			'writer' => 2,
    			'message' => 'Reply to short message'
     		]);
    }
}
