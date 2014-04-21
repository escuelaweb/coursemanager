<?php

use LaravelBook\Ardent\Ardent;

class Coursedate extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
		'course_id'			=> 'required|integer|exists:courses,id',
		'classroom_id'	=> 'required|integer|exists:classrooms,id',
		'instructor_id'	=> 'required|integer|exists:users,id',
		'start_date'		=> 'required|date|after:-1 day',
		'end_date'			=> 'required|date|after:-1 day',
		'quorum'				=> 'required|integer|min:1|max:15',
		
	);	

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