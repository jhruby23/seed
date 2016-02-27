<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Eloquent::unguard();	
    		$this->call(UsersTableSeeder::class);
    		$this->call(CategoriesTableSeeder::class);
    		$this->call(SubcategoriesTableSeeder::class);
    		$this->call(ProductsTableSeeder::class);
    		$this->call(BidsTableSeeder::class);
    		$this->call(BidConversationsTableSeeder::class);
    		$this->call(CommentsTableSeeder::class);
    }
}
