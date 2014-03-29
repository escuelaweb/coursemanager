<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$courses = array(

			['title' => 'Desarrollo con Laravel (PHP 5)', 'oriented_to' => 'Desarrolladores con experiencia en PHP o similares que deseen conocer el más vanguardista y mencionado framework de la actualidad', 'contents' => 'Prueba de contenidos'],
			['title' => 'Diseño web con HTML y CSS', 'oriented_to' => 'Cualquier persona que desee aprender las herramientas básicas para crear y diseñar páginas web', 'contents' => 'Prueba de contenido']

		);

		foreach($courses as $course)
		{
			$mCourse							= new Course();
			$mCourse->title 			= $course['title'];
			$mCourse->oriented_to = $course['oriented_to'];
			$mCourse->contents 		= $course['contents'];

			$mCourse->save();
		}
	}

}