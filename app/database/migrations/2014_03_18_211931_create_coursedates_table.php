<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursedatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coursedates', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('course_id')->unsigned()->index();
			$table->integer('classroom_id')->unsigned()->index();
			$table->integer('instructor_id')->unsigned()->index();
			$table->date('start_date');
			$table->date('end_date');
			$table->smallInteger('quorum')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
			$table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('coursedates');
	}

}
