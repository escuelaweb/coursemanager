<?php

use LaravelBook\Ardent\Ardent;

class CoursedateUserStatus extends Ardent {
	protected $fillable = [];

	public function coursedateUser() {
		return $this->hasMany('CoursedateUser', 'status');
	}
}