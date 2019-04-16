<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('thread_id');
            $table->unsignedInteger('student_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('thread_id')->references('id')->on('discussion_threads')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_replies');
    }
}
