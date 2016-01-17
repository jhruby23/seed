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
				$table->integer('user')->unsigned();
				$table->string('notification_type');
				$table->boolean('seen');
				$table->integer('product')->unsigned()->nullable();
				$table->integer('bid')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('user')
            		->references('id')->on('users');
            $table->foreign('product')
            		->references('id')->on('products');
            $table->foreign('bid')
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
