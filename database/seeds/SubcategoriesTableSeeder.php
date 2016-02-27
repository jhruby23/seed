<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Subcategory::create([
    			'category_id' => 1,
    			'name' => 'First type'
    		]);
    		
    		Subcategory::create([
    			'category_id' => 2,
    			'name' => 'Second type'
    		]);
    		
    		Subcategory::create([
    			'category_id' => 1,
    			'name' => 'Third type'
    		]);
    }
}
