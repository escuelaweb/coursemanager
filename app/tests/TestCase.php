<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	* Default preparation for each test
	*
	*/
	public function setup()
	{
		parent::setUp();
		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	* Method that performs preparation for each test
	*
	* @return void
	*/
	public function prepareForTests()
	{
		Artisan::call('migrate');		
		$this->seed();
	}
}
