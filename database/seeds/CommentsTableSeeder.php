<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Comment::create([
    			'product_id' => 1,
    			'writer' => 1,
    			'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, aliquid.'
    		]);
    		
    		Comment::create([
    			'product_id' => 1,
    			'writer' => 2,
    			'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, inventore.'
    		]);
    }
}
