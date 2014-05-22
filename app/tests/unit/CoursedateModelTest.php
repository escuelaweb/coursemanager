<?php

class CoursedateModelTest extends TestCase {

	public function testCreate()
	{
		//Empty attributes
		$coursedate = new Coursedate();

		$coursedate->course_id			= '';
		$coursedate->classroom_id		= '';
		$coursedate->instructor_id	= '';
		$coursedate->start_date 		= '';
		$coursedate->end_date 			= '';
		$coursedate->quorum 				= '';

		$this->assertFalse($coursedate->save());

		$this->assertGreaterThan(0, $coursedate->validationErrors->get('course_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('classroom_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('instructor_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('start_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('end_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('quorum'));

		//Invalid attributes
		$coursedate = new Coursedate();

		$coursedate->course_id			= 1024;
		$coursedate->classroom_id		= 2048;
		$coursedate->instructor_id	= 4096;
		$coursedate->start_date 		= '1987-10-31';
		$coursedate->end_date 			= 'It\'s a new dawn, it\'s a new day, it\'s a new life, for me, and I\'m Feeling good!!';
		$coursedate->quorum 				= 34;

		$this->assertFalse($coursedate->save());

		$this->assertGreaterThan(0, $coursedate->validationErrors->get('course_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('classroom_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('instructor_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('start_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('end_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('quorum'));

		//Valid attributes
		$coursedate = new Coursedate();

		$coursedate->course_id			= 1;
		$coursedate->classroom_id		= 1;
		$coursedate->instructor_id	= 1;
		$coursedate->start_date 		= date('Y-m-d H:i:s', strtotime('+1 day'));
		$coursedate->end_date 			= date('Y-m-d H:i:s', strtotime('+2 week'));
		$coursedate->quorum 				= 12;

		$this->assertTrue($coursedate->save());
	}

	public function testRead()
	{
		//Read by id
		$coursedate = Course::find(1);

		foreach($coursedate as $key => $attr)
		{
			$coursedate->$key = $attr;
		}

		//Validate attributes by saving object
		$this->assertTrue($coursedate->save());
	}

	public function testUpdate()
	{
		//Invalid attributes
		$coursedate = Coursedate::find(1);

		$coursedate->course_id			= 1024;
		$coursedate->classroom_id		= 2048;
		$coursedate->instructor_id	= 4096;
		$coursedate->start_date 		= 'It\'s a new dawn, it\'s a new day, it\'s a new life, for me, and I\'m Feeling good!!';
		$coursedate->end_date 			= '1987-10-31';
		$coursedate->quorum 				= -10;

		$this->assertFalse($coursedate->updateUniques());

		$this->assertGreaterThan(0, $coursedate->validationErrors->get('course_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('classroom_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('instructor_id'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('start_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('end_date'));
		$this->assertGreaterThan(0, $coursedate->validationErrors->get('quorum'));

		//Valid attributes
		$coursedate = Coursedate::find(1);

		$coursedate->course_id			= 2;
		$coursedate->classroom_id		= 1;
		$coursedate->instructor_id	= 1;
		$coursedate->start_date 		= date('Y-m-d H:i:s', strtotime('+3 day'));
		$coursedate->end_date 			= date('Y-m-d H:i:s', strtotime('+10 week'));
		$coursedate->quorum 				= 7;

		$this->assertTrue($coursedate->updateUniques());

	}

	public function testDelete()
	{
		$coursedate = Coursedate::find(1);

		$this->assertTrue($coursedate->delete());

		$this->assertNull(Coursedate::find(1));
	}
}