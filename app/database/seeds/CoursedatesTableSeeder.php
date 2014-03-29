<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursedatesTableSeeder extends Seeder {

	public function run()
	{
		$faker 			= Faker::create();
		$instructor	= Role::where('label', '=', 'admin')->with('users')->first()->users()->first();
		$classroom	= Classroom::first();

		foreach(Course::all() as $course)
		{
			//Three dates, one through instructor, one through classroom, one through course
			
			//Instructor
			$coursedate 								= new Coursedate();
			$coursedate->course_id			= $course->id;
			$coursedate->classroom_id		= $classroom->id;
			$coursedate->start_date 			= '2014-05-20';
			$coursedate->end_date 				= '2014-07-12';
			$coursedate->quorum 				= 7;

			$instructor->courseDatesAsInstructor()->save($coursedate);

			//Classroom
			$coursedate 								= new Coursedate();
			$coursedate->course_id			= $course->id;
			$coursedate->instructor_id	= $instructor->id;
			$coursedate->start_date 			= '2014-05-07';
			$coursedate->end_date 				= '2014-06-19';
			$coursedate->quorum 				= 15;

			$classroom->coursedates()->save($coursedate);

			//Course
			$coursedate 								= new Coursedate();
			$coursedate->classroom_id		= $classroom->id;
			$coursedate->instructor_id	= $instructor->id;
			$coursedate->start_date 			= '2014-09-02';
			$coursedate->end_date 				= '2014-09-23';
			$coursedate->quorum 				= 10;

			$course->coursedates()->save($coursedate);
		}
	}

}