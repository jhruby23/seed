<?php

use Illuminate\Database\Seeder;
use App\ProductType;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		ProductType::create(['name' => 'First type']);
    		ProductType::create(['name' => 'Second type']);
    		ProductType::create(['name' => 'Third type']);
    }
}
