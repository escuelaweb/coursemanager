<?php

class CoursedateUserStatusModelTest extends TestCase {

	public function testCreate()
	{
		//Creating a CoursedateUserStatus with empty attributes
		$cds = new CoursedateUserStatus();

		$cds->title 			= '';
		$cds->label 			= '';
		$cds->description = '';

		$this->assertFalse($cds->save());

		$this->assertGreaterThan(0, count($cds->validationErrors->get('title')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('label')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('description')));

		//Creating a CoursedateUserStatus with invalid attributes
		$cds = new CoursedateUserStatus();

		$cds->title 			= '1234567890123456789012345678901234567890123456789012345';
		$cds->label 			= 'signed_up';
		$cds->description = '';

		$this->assertFalse($cds->save());

		$this->assertGreaterThan(0, count($cds->validationErrors->get('title')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('label')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('description')));
		
		//Creating a CoursedateUserStatus with valid attributes
		$cds = new CoursedateUserStatus();

		$cds->title 			= '12345678901234567890123456789012345678901234567890';
		$cds->label 			= 'test label';
		$cds->description = 'Ola k ase? Prueva hunitaria o ke ase?';

		$this->assertTrue($cds->save());
		
		$this->assertTrue(is_int($cds->id));
	}

	public function testRead()
	{
		//Reading by primary key
		$cds = CoursedateUserStatus::find(2);

		$this->assertNotNull($cds);
		$this->assertEquals('Pago enviado', $cds->title);
		$this->assertEquals('payment_sent', $cds->label);
		$this->assertEquals('El usuario envió el pago, esperando confirmación', $cds->description);

		//Reading by label
		//Reading by primary key
		$cds = CoursedateUserStatus::where('label', '=', 'payment_confirmed')->get()->first();

		$this->assertNotNull($cds);
		$this->assertEquals(3, $cds->id);
		$this->assertEquals('Pago confirmado', $cds->title);		
		$this->assertEquals('Se ha confirmado el pago', $cds->description);		
	}

	public function testUpdate()
	{
		//Updating with invalid/repeated attributes
		$cds = CoursedateUserStatus::find(1);

		$cds->title 			= '1234567890123456789012345678901234567890123456789012345';
		$cds->label 			= 'payment_sent';
		$cds->description = '';

		$this->assertFalse($cds->updateUniques());
		
		$this->assertGreaterThan(0, count($cds->validationErrors->get('title')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('label')));
		$this->assertGreaterThan(0, count($cds->validationErrors->get('description')));

		//Updating with valid attributes
		$cds = CoursedateUserStatus::find(3);

		$cds->title 			= 'WOW much payment, such money';
		$cds->label 			= 'wow_much_payment';
		$cds->description = 'WOW much payment, such money, very profit';

		$this->assertTrue($cds->updateUniques());
	}

	public function testDelete()
	{
		$cds = CoursedateUserStatus::find(2);

		$this->assertNotNull($cds);

		$this->assertTrue($cds->delete());

		$found = false;

		foreach(CoursedateUserStatus::all() as $cds)
		{
			if($cds->id == 2)
			{
				$found = true;
			}
		}

		$this->assertFalse($found);
	}
}