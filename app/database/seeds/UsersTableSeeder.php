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

	$ruts = array(
		'23845761-0',
		'23845762-9',
		'23845763-7',
		'23845764-5',
		'23845765-3',
		'23845766-1',
		'23845767-K',
		'23845768-8',
		'23845769-6',
		'23845770-K'
	);

	foreach(range(1, 10) as $key => $index) {
		User::create([
			'first_name'						=> $faker->firstName,
			'last_name'							=> $faker->lastName,
			'email'									=> $faker->email,
			'rut'										=> $ruts[$key],
			'password'							=> '12345678',
			'birthday'							=> $faker->date('Y-m-d', '-10 years')
		]);
	}
	}

}