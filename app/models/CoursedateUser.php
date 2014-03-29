<?php

use LaravelBook\Ardent\Ardent;

class CoursedateUser extends Ardent {
	protected $fillable = [];

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