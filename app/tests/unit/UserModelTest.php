<?php

class UserModelTest extends TestCase {

	public function testCreate()
	{
		//Creating model with empty attributes
		$user = new User();

		$this->assertFalse($user->save());

		$this->assertGreaterThan(0, $user->validationErrors->get('first_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('last_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('email'));
		$this->assertGreaterThan(0, $user->validationErrors->get('rut'));
		$this->assertGreaterThan(0, $user->validationErrors->get('password'));
		$this->assertGreaterThan(0, $user->validationErrors->get('birthday'));

		//Creating model with invalid attributes
		$user = new User();
		$user->first_name = '12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890';
		$user->last_name = '12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890';
		$user->email = 'abcdef';
		$user->rut = '48170393-1';
		$user->password = '12345678';
		$user->password_confirmation = '123456';
		$user->birthday = '1987';

		$this->assertFalse($user->save());

		$this->assertGreaterThan(0, $user->validationErrors->get('first_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('last_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('email'));
		$this->assertGreaterThan(0, $user->validationErrors->get('rut'));
		$this->assertGreaterThan(0, $user->validationErrors->get('password'));
		$this->assertGreaterThan(0, $user->validationErrors->get('birthday'));

		//Creating model with valid attributes
		$user = new User();
		$user->first_name = 'Jai';
		$user->last_name = 'me';
		$user->email = 'jai.me@gmail.com.ve';
		$user->rut = '23.845.771-8';
		$user->password = '12345678';
		$user->password_confirmation = '12345678';
		$user->birthday = '1972-03-29';

		$this->assertTrue($user->save());

		$this->assertTrue(is_int($user->id));
	}

	public function testRead()
	{
		//Reading by primary key
		$user = User::find(1);

		$this->assertNotNull($user);
		$this->assertEquals(1, $user->id);
		$this->assertEquals('pankas87@gmail.com', $user->email);

		//Reading by email
		$user = User::where('email', '=', 'pankas87@gmail.com')->get()->first();

		$this->assertNotNull($user);
		$this->assertEquals(1, $user->id);
		$this->assertEquals('pankas87@gmail.com', $user->email);
	}

	public function testUpdate()
	{
		//Updating with repeated/invalid attributes
		$user = User::find(2);
		$user->first_name = '12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890';
		$user->last_name = '';
		$user->email = 'pankas87@gmail.com';
		$user->rut = '48170393-K';
		$user->password = '';
		$user->password_confirmation = '123456';
		$user->birthday = '1987';		

		$this->assertFalse($user->updateUniques());

		$this->assertGreaterThan(0, $user->validationErrors->get('first_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('last_name'));
		$this->assertGreaterThan(0, $user->validationErrors->get('email'));
		$this->assertGreaterThan(0, $user->validationErrors->get('rut'));
		$this->assertGreaterThan(0, $user->validationErrors->get('password'));
		$this->assertGreaterThan(0, $user->validationErrors->get('birthday'));		

		//Updating with valid attributes
		$user = User::find(2);
		$user->first_name = 'Shirley';
		$user->last_name = 'Manson';
		$user->email = 'shirley_manson@garbage.com';
		$user->birthday = '1966-08-26';

		$this->assertTrue($user->updateUniques());
	}

	public function testDelete()
	{
		$user = User::find(4);

		$this->assertNotNull($user);

		$this->assertTrue($user->delete());

		$this->assertNull(User::find(4));
	}

}