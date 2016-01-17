<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned();
            $table->integer('writer')->unsigned();
            $table->string('message');
            $table->timestamps();
            
            $table->foreign('bid')
            		->references('id')->on('bids');
            $table->foreign('writer')
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
        Schema::drop('bid_conversations');
    }
}
