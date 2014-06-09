<?php

class CoursedateUserModelTest extends TestCase {

	public function testCreate()
	{
    //Initializations
    $users      = Role::with('users')->find(3)->users;
    $coursedate = Coursedate::find(1);
		
    //Invalid Attributes: Empty or non-integer
    $cdu                = new CoursedateUser();
    $cdu->coursedate_id = 'Ola ke ase? La kaga o k ase?';
    $cdu->user_id       = '';
    $cdu->status        = "Psycho Killer qu'est-ce que c'est?";

    $this->assertFalse($cdu->save());

    $this->assertGreaterThan(0, count($cdu->validationErrors->get('coursedate_id')));
    $this->assertGreaterThan(0, count($cdu->validationErrors->get('user_id')));
    $this->assertGreaterThan(0, count($cdu->validationErrors->get('status')));

    //Invalid Attributes: Non-existing IDs
    $cdu                = new CoursedateUser();
    $cdu->coursedate_id = 1024;
    $cdu->user_id       = 2048;
    $cdu->status        = 4096;

    $this->assertFalse($cdu->save());

    $this->assertGreaterThan(0, count($cdu->validationErrors->get('coursedate_id')));
    $this->assertGreaterThan(0, count($cdu->validationErrors->get('user_id')));
    $this->assertGreaterThan(0, count($cdu->validationErrors->get('status')));

    //Testing quorum limitation (Testing correct save when attributes are valid in parallel)
    $i = 0;
    foreach($users as $user)
    {
      $cdu                = new CoursedateUser();
      $cdu->user_id       = $user->id;
      $cdu->coursedate_id = $coursedate->id;
      $cdu->status        = 1;
      
      if(++$i <= $coursedate->quorum)
      {
        $this->assertTrue($cdu->save());
        
      }
      else
      {
        $this->assertFalse($cdu->save());
        break;
      }
    }
    $this->assertTrue($i == ($coursedate->quorum + 1));
	}

	public function testRead()
	{
    //Read by id: existing ID
    $cdu = CoursedateUser::find(1);

    foreach($coursedate as $key => $attr)
    {
      $coursedate->$key = $attr;
    }

    //Validate attributes by saving object
    $this->assertTrue($cdu->save());

    //Read by id: Non-existing id
    $cdu = CoursedateUser::find(1024);

    $this->assertNull($cdu);
	}

	public function testUpdate()
	{
	}

	public function testDelete()
	{
	}
}