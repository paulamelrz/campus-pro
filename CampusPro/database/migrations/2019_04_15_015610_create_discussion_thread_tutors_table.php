<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionThreadTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_thread_tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tutor_id');
            $table->unsignedBigInteger('channel_id');
            $table->unsignedInteger('replies_count')->default(0);
            $table->string('title');
            $table->text('body');
            $table->unsignedInteger('best_reply_id')->nullable();
            $table->boolean('flag')->default(false);
            $table->timestamps();

            $table->foreign('best_reply_id')->references('id')->on('discussion_replies_tutors')->onDelete('set null');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
            $table->foreign('channel_id')->references('channel_id')->on('channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_thread-tutors');
    }
}
