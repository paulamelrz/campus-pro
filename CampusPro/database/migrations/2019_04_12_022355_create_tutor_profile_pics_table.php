<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorProfilePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_profile_pics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->string('src');
            $table->integer('size');
            $table->unsignedInteger('tutor_id');
            $table->dateTime('created_at');

            //foreign key constraints
            $table->foreign('tutor_id')
                ->references('id')->on('tutors')
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
        Schema::dropIfExists('tutor_profile_pics');
    }
}
