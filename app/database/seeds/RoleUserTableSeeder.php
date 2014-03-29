<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RoleUserTableSeeder extends Seeder {

	public function run()
	{
		//Load list of roles
		$adminRole 			= Role::where('label', '=', 'admin')->first();
		$instructorRole	= Role::where('label', '=', 'instructor')->first();
		$studentRole		= Role::where('label', '=', 'student')->first();

		//Traverse registered users list
		foreach(User::all() as $user)
		{
			//Add Student Role
			$user->roles()->attach($studentRole->id);

			if($user->email == 'pankas87@gmail.com')
			{
				//Add instructor and admin role
				$user->roles()->attach($instructorRole->id);
				$user->roles()->attach($adminRole->id);
			}
		}		
	}

}