<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classrooms', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('address', 255);
			$table->decimal('lat', 10,8);
			$table->decimal('long', 11,8);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classrooms');
	}

}
