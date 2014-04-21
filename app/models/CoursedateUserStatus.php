<?php

use LaravelBook\Ardent\Ardent;

class CoursedateUserStatus extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
		'title'				=> 'required|max:50',
		'label'				=> 'required|max:50|unique:coursedate_user_statuses,label',
		'description'	=> 'required'
	);	

	public function coursedateUser() {
		return $this->hasMany('CoursedateUser', 'status');
	}
}