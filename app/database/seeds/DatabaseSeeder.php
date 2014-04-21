<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RolesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('RoleUserTableSeeder');
		$this->call('ClassroomsTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('CoursedateUserStatusesTableSeeder');
		$this->call('CoursedatesTableSeeder');

	}

}