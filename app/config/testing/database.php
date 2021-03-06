<?php

return array(

	'default' => 'sqlite',
	
	'connections' => array(
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		),
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'avant_garde_testing',
			'username'  => 'root',
			'password'  => 'postlecitos',
			'charset'   => 'utf8',
			'collation' => 'utf8_spanish_ci',
			'prefix'    => '',
		),		
	),
);
