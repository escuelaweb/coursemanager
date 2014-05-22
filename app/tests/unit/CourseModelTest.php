<?php

class CourseModelTest extends TestCase {

	public function testCreate()
	{
		
		//Invalid attributes
		$course = new Course();

		$course->title = '';

		$this->assertFalse($course->save());

		$this->assertGreaterThan(0, count($course->validationErrors->get('title')));

		//Valid attributes
		$course = new Course();

		$course->title 				= 'Curso de prueba';
		$course->oriented_to 	= 'Profesionales de IT';
		$course->contents 		= 'Güevonadas de esas de programación';

		$this->assertTrue($course->save());
	}

	public function testRead()
	{
		//Read by id
		$course = Course::find(1);

		$this->assertNotNull($course);
		$this->assertEquals('Desarrollo con Laravel (PHP 5)', $course->title);
		$this->assertNotEquals('', $course->oriented_to);
		$this->assertNotEquals('', $course->contents);
	}

	public function testUpdate()
	{
		//Invalid attributes
		$course = Course::find(1);

		$course->title = '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890';

		$this->assertFalse($course->updateUniques());

		$this->assertGreaterThan(0, count($course->validationErrors->get('title')));

		//Valid attributes
		$course = Course::find(1);

		$course->title = 'Título de prueba';

		$this->assertTrue($course->save());
	}

	public function testDelete()
	{
		$course = Course::find(1);

		$this->assertTrue($course->delete());

		$found = false;

		foreach(Course::all() as $course)
		{
			if($course->id == 1)
			{
				$found = true;
				break;
			}
		}
		$this->assertFalse($found);
	}
}