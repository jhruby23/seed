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
	 			'description' => 'Desc',
	 			'quantity' => 1,
	 			'owner_id' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonth(),
	 			'views' => 400
    		]);
    		
    		Product::create([
    			'name' => 'Product Two',
	 			'subcategory_id' => 2,
	 			'price' => 200,
	 			'description' => 'Desc',
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
	 			'description' => 'Desc',
	 			'quantity' => 10,
	 			'owner_id' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonths(3),
	 			'views' => 500
    		]);
    }
}
