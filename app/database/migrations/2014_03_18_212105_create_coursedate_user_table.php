<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursedateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coursedate_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('coursedate_id')->unsigned()->index();
			$table->foreign('coursedate_id')->references('id')->on('coursedates')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('status')->unsigned()->index();
			$table->foreign('status')->references('id')->on('coursedate_user_statuses')->onDelete('cascade');
			$table->unique(array('coursedate_id', 'user_id'));
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
		Schema::drop('coursedate_user');
	}

}
