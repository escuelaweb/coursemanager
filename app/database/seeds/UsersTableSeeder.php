<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run() {
	
	User::create([
		'first_name'							=> 'Leonardo',
		'last_name'								=> 'Graterol',
		'email'										=> 'pankas87@gmail.com',
		'rut'											=> '48170393-K',
		'password'								=> '12345678',
		'birthday'								=> '1987-10-31'
	]);

	$faker = Faker::create();

	foreach(range(1, 10) as $index) {
		User::create([
			'first_name'						=> $faker->firstName,
			'last_name'							=> $faker->lastName,
			'email'									=> $faker->email,
			'rut'										=> '30686957-X',
			'password'							=> '12345678',
			'birthday'							=> $faker->date('Y-m-d', '-10 years')
		]);
	}
	}

}