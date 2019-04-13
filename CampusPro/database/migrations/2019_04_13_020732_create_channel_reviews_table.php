<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('channels_id');
            $table->unsignedInteger('stu_id');
            $table->string('title');
            $table->string('comment')->nullable();
            $table->float('stars', 2, 1);
            $table->biginteger('likes')->default(0);           
            $table->timestamps();
            
            //foreign key constraints


            $table->foreign('stu_id')
            ->references('id')->on('students')
            ->onDelete('cascade');   

            $table->foreign('channels_id')
            ->references('channel_id')->on('channels')
            ->onDelete('cascade');

        });

     

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_reviews');
    }
}
