<?php

return array(

	'default' => 'pgsql',
	
	'connections' => array(
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'avant_garde',
			'username'  => 'root',
			'password'  => 'postlecitos',
			'charset'   => 'utf8',
			'collation' => 'utf8_spanish_ci',
			'prefix'    => '',
		),
		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'dev_academy',
			'username' => 'postgres',
			'password' => 'postlecitos',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),		
	),
);
