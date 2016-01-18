<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item')->unsigned();
            $table->integer('offer')->unsigned();
            $table->integer('owner')->unsigned();
            $table->integer('buyer')->unsigned();
            $table->dateTime('date_completed')->nullable();
            $table->boolean('success');
            $table->timestamps();
            
            $table->foreign('item')
            		->references('id')->on('products');
            $table->foreign('offer')
            		->references('id')->on('products');
            $table->foreign('owner')
            		->references('id')->on('users');
            $table->foreign('buyer')
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
        Schema::drop('bids');
    }
}
