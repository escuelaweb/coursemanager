<?php

class RoleModelTest extends TestCase {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Testing create operation
	 *
	 * @return void
	 */
	public function testCreate()
	{
		//Creating a Role with empty attributes
		$role 				= new Role();
		$role->name 	= '';
		$role->label 	= '';

		$this->assertFalse($role->save());

		$this->assertGreaterThan(0, count($role->validationErrors->get('name')));
		$this->assertGreaterThan(0, count($role->validationErrors->get('label')));

		//Creating a Role with an existing label and name
		$role 				= new Role();
		$role->name 	= 'Administrator';
		$role->label 	= 'instructor';

		$this->assertFalse($role->save());

		$this->assertGreaterThan(0, count($role->validationErrors->get('name')));
		$this->assertGreaterThan(0, count($role->validationErrors->get('label')));

		//Creating a Role with completely new and not empty attributes
		$role 				= new Role();
		$role->name 	= 'instructor';
		$role->label 	= 'Administrator';

		$this->assertTrue($role->save());
		
		$this->assertTrue(is_int($role->id));
	}
	
	/**
	 * Testing read operation
	 *
	 * @return void
	 */
	public function testRead()
	{
		//Reading by primary key
		$role = Role::find(1);

		$this->assertNotNull($role);
		$this->assertEquals(1, $role->id);
		$this->assertEquals('Administrator', $role->name);
		$this->assertEquals('admin', $role->label);

		//Reading by label
		$role = Role::where('label', '=', 'student')->get()->first();

		$this->assertNotNull($role);
		$this->assertEquals(3, $role->id);
		$this->assertEquals('Student', $role->name);
		$this->assertEquals('student', $role->label);		
	}

	/**
	 * Testing delete operation
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$role 	= Role::find(1);
		$found	= false;

		$this->assertTrue($role->delete());			

		foreach(Role::all() as $role)
		{
			if($role->id == 1)
			{
				$found = true;
				break;
			}
		}
		
		$this->assertFalse($found);
	}
}