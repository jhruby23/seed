<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('subcategory_id')->unsigned();
            $table->integer('price');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('views');
            $table->integer('owner_id')->unsigned();
            $table->boolean('public');
            $table->dateTime('date_of_end');
            $table->timestamps();
            
            $table->foreign('subcategory_id')
            		->references('id')->on('subcategories');
            $table->foreign('owner_id')
            		->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
