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

	}

	public function testUpdate()
	{

	}

	public function testDelete()
	{

	}

}