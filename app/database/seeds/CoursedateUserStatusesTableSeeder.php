<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursedateUserStatusesTableSeeder extends Seeder {

	public function run()
	{

		$CoursedateUserStatus = array(
			['title'	=> 'Inscrito', 'label' => 'signed_up', 'description' => 'El usuario se registró pero aún no ha enviado información de pago'],
			['title'	=> 'Pago enviado', 'label' => 'payment_sent', 'description' => 'El usuario envió el pago, esperando confirmación'],
			['title'	=> 'Pago confirmado', 'label' => 'payment_confirmed', 'description' => 'Se ha confirmado el pago']
		);
		
		foreach($CoursedateUserStatus as $CUS)
		{
			CoursedateUserStatus::create($CUS);
		}
	}

}