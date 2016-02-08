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
    		$this->call('UsersTableSeeder');
    		$this->call('CategoriesTableSeeder');
    		$this->call('ProductTypesTableSeeder');
    		$this->call('ProductsTableSeeder');
    		$this->call('BidsTableSeeder');
    		$this->call('BidConversationsTableSeeder');
    }
}
