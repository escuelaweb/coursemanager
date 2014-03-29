<?php

use LaravelBook\Ardent\Ardent;

class Coursedate extends Ardent {
	protected $fillable = [];

	public function classroom() {
		return $this->belongsTo('Classroom');
	}

	public function course() {
		return $this->belongsTo('Course');
	}

	public function instructor() {
		return $this->belongsTo('User', 'instructor_id');
	}

	public function students() {
		return $this->hasMany('CoursedateUser');
	}
}