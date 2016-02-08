<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
				$table->integer('user_id')->unsigned();
				$table->string('notification_type');
				$table->boolean('seen');
				$table->integer('product_id')->unsigned()->nullable();
				$table->integer('bid_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')
            		->references('id')->on('users');
            $table->foreign('product_id')
            		->references('id')->on('products');
            $table->foreign('bid_id')
            		->references('id')->on('bids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
