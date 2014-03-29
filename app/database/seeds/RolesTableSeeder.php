<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run() {
		Role::create([
			'name'		=> 'Administrator',
			'label'		=> 'admin'
		]);

		Role::create([
			'name'		=> 'Instructor',
			'label'		=> 'instructor'
		]);

		Role::create([
			'name'		=> 'Student',
			'label'		=> 'student'
		]);		

	}

}