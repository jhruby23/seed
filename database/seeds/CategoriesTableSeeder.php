<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Category::create(['name' => 'First category']);
    		Category::create(['name' => 'Second category']);
    		Category::create(['name' => 'Third category']);
    }
}
