<?php

class ClassroomModelTest extends TestCase {

	public function testCreate()
	{
		//Empty/Invalid attributes
		$classroom = new Classroom();

		$classroom->name 		= '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345';
		$classroom->address = '';
		$classroom->lat 		= 'WOW';
		$classroom->long 		= 'very latitude, much geolocation';

		$this->assertFalse($classroom->save());

		$this->assertGreaterThan(0, count($classroom->validationErrors->get('name')));
		$this->assertGreaterThan(0, count($classroom->validationErrors->get('address')));
		$this->assertGreaterThan(0, count($classroom->validationErrors->get('lat')));
		$this->assertGreaterThan(0, count($classroom->validationErrors->get('long')));

		//Valid attributes
		$classroom = new Classroom();

		$classroom->name 		= '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890';
		$classroom->address = 'Por ahí';
		$classroom->lat 		= '-31.571790';
		$classroom->long 		= '-77.84252';

		$this->assertTrue($classroom->save());	
	}

	public function testRead()
	{
		//Read by id
		$classroom = Classroom::find(1);

		$this->assertEquals('Casa del profe po!', $classroom->name);
		$this->assertEquals('Carmen 237, Santiago', $classroom->address);
		$this->assertEquals('-70.64243400', $classroom->long);
		$this->assertEquals('-33.44681100', $classroom->lat);
	}

	public function testUpdate()
	{
		//Invalid/Empty attributes
		$classroom = Classroom::find(1);

		$classroom->name 		= '';
		$classroom->address = '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345';
		$classroom->lat 		= 'WOW';
		$classroom->long 		= 'very latitude, much geolocation';

		$this->assertFalse($classroom->updateUniques());

		//Valid attributes
		$classroom->name 		= 'Nombre de Prueba';
		$classroom->address = 'Dirección de Prueba';
		$classroom->lat 		= '';
		$classroom->long 		= '';

		$this->assertTrue($classroom->updateUniques());
	}

	public function testDelete()
	{
		$classroom = Classroom::find(1);

		$this->assertTrue($classroom->delete());

		$found = false;

		foreach(Classroom::all() as $classroom)
		{
			if($classroom->id == 1)
			{
				$found = true;
				break;
			}
		}

		$this->assertFalse($found);
	}
}