<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_threads', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('student_id');
                $table->unsignedBigInteger('channel_id');
                $table->unsignedInteger('replies_count')->default(0);
                $table->string('title');
                $table->text('body');
                $table->boolean('flag')->default(false);
                $table->timestamps();


                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

                $table->foreign('channel_id')->references('channel_id')->on('channels')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_threads');
    }
}
