<?php

use Illuminate\Database\Seeder;

use App\Product;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Product::create([
    			'name' => 'Product One',
	 			'subcategory_id' => 1,
	 			'price' => 100,
	 			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, quo.',
	 			'quantity' => 1,
	 			'owner_id' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonth(),
	 			'views' => 400
    		]); 
    		
    		Product::create([
    			'name' => 'Lorem Ipsum',
	 			'subcategory_id' => 1,
	 			'price' => 123,
	 			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, quo.',
	 			'quantity' => 10,
	 			'owner_id' => 2,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonth(),
	 			'views' => 250
    		]);
    		
    		Product::create([
    			'name' => 'Another Awesome Product',
	 			'subcategory_id' => 1,
	 			'price' => 1000,
	 			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, quo.',
	 			'quantity' => -1,
	 			'owner_id' => 2,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonth(),
	 			'views' => 200
    		]);
    		
    		Product::create([
    			'name' => 'Product Two',
	 			'subcategory_id' => 2,
	 			'price' => 200,
	 			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, pariatur.',
	 			'quantity' => 10,
	 			'owner_id' => 2,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonths(2),
	 			'views' => 300
    		]);
    		
    		Product::create([
    			'name' => 'Product Three',
	 			'subcategory_id' => 3,
	 			'price' => 300,
	 			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, obcaecati.',
	 			'quantity' => 10,
	 			'owner_id' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonths(3),
	 			'views' => 500
    		]);
    		
    		Product::create([
    			'name' => 'Product Three',
	 			'subcategory_id' => 1,
	 			'price' => 500,
	 			'description' => 'Description',
	 			'quantity' => 10,
	 			'owner_id' => 2,
	 			'public' => false,
	 			'date_of_end' => Carbon::now()->addMonths(3),
	 			'views' => 500
    		]);
    }
}
