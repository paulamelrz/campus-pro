<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->bigIncrements('channel_id');
            $table->integer('tutor_id')->unsigned();
            $table->string('channel_name');
            $table->unsignedBigInteger('course_id');
            $table->text('description')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();

            //foreign key constraints
             $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
