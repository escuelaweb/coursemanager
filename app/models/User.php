<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
			'first_name'						=> 'required|max:120',
			'last_name'							=> 'required|max:120',
			'email'									=> 'required|max:255|email|unique:users,email',
			'rut'										=> 'required|max:12|unique:users,rut|rut',
			'password'							=> 'required',
			'password_confirmation'	=> 'same:password',
			'birthday'							=> 'required|date'
		);

	/**
	* Ardent hashed attributes
	*
	* @var array
	*/
	public static $passwordAttributes 		= array('password');

	/**
	* Ardent purge redundant attributes
	*
	* @var bool
	*/
	public $autoPurgeRedundantAttributes	= true;	

	/**
	* Ardent automatically hash secure attrbiutes
	*
	* @var bool
	*/  
  public $autoHashPasswordAttributes 		= true;	

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}	

	public function roles() {
		return $this->belongsToMany('Role');
	}

	public function courseDatesAsStudent()
	{
		return $this->hasMany('CoursedateUser');
	}

	public function courseDatesAsInstructor()
	{
		return $this->hasMany('Coursedate', 'instructor_id');
	}

	public function beforeValidate()
	{
		$this->rut = str_replace('.', '', $this->rut);

		return true;
	}
}