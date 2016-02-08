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
	 			'category_id' => 1,
	 			'product_type_id' => 1,
	 			'price' => 100,
	 			'description' => 'Desc',
	 			'quantity' => 1,
	 			'owner' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonth()
    		]);
    		
    		Product::create([
    			'name' => 'Product Two',
	 			'category_id' => 2,
	 			'product_type_id' => 2,
	 			'price' => 200,
	 			'description' => 'Desc',
	 			'quantity' => 10,
	 			'owner' => 2,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonths(2)
    		]);
    		
    		Product::create([
    			'name' => 'Product Three',
	 			'category_id' => 3,
	 			'product_type_id' => 3,
	 			'price' => 300,
	 			'description' => 'Desc',
	 			'quantity' => 10,
	 			'owner' => 1,
	 			'public' => true,
	 			'date_of_end' => Carbon::now()->addMonths(3)
    		]);
    }
}
