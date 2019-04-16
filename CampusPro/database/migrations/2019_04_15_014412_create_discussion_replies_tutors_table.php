<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionRepliesTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_replies_tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedbigInteger('thread_id');
            $table->unsignedInteger('tutor_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('thread_id')->references('id')->on('discussion_thread_tutors')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');


        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_replies-tutors');
    }
}
