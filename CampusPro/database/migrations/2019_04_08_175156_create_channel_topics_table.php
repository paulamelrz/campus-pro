<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('channels_id');
            $table->string('title');
            $table->text('textarea')->nullable();
            $table->timestamps();

            //foreign key constraints
            $table->foreign('channels_id')->references('channel_id')->on('channels')->onDelete('cascade');
        });

       

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_topics');
    }
}
