<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('country', function(Blueprint $table)
		{
			$table->string('country_code', 2)->primary();
			$table->string('country_name', 30);
		});
        //\DB::unprepared( file_get_contents(\Storage::path('country.sql') ));

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('country');
	}

}
