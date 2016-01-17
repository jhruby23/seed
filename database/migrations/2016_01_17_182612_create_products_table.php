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
            $table->integer('category')->unsigned();
            $table->integer('product_type')->unsigned();
            $table->integer('price');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('views');
            $table->integer('owner')->unsigned();
            $table->boolean('public');
            $table->dateTime('date_of_end');
            $table->timestamps();
            
            $table->foreign('category')
            		->references('id')->on('categories');
            $table->foreign('product_type')
            		->references('id')->on('product_types');
            $table->foreign('owner')
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
