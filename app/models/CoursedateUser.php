<?php

use LaravelBook\Ardent\Ardent;

class CoursedateUser extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
		'coursedate_id'	=> 'required|integer|exists:coursedates,id',
		'user_id'				=> 'required|integer|exists:users,id',
		'status'				=> 'required|integer|exists:coursedate_user_statuses,id'
	);

	public function coursedate() {
		return $this->belongsTo('Coursedate');
	}

	public function coursedateUserStatus() {
		return $this->belongsTo('CoursedateUserStatus', 'status');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}