<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClassroomsTableSeeder extends Seeder {

	public function run()
	{
		Classroom::create([
			'name'			=> 'Casa del profe po!',
			'address'		=> 'Carmen 237, Santiago',
			'lat'				=> '-33.446811',
			'long'			=> '-70.642434'
		]);
	}

}