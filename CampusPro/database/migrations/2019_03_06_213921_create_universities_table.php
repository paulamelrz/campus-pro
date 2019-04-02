<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUniversitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('university', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('country_code', 2);
            $table->string('uni_name', 70);

            //foreign key constraints
            $table->foreign('country_code')->references('country_code')->on('country')->onDelete('cascade');
        });
        
        //\DB::unprepared( file_get_contents(\Storage::path('university.sql') ));


	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('university');
	}

}
