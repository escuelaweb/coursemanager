<?php

use LaravelBook\Ardent\Ardent;

class Course extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
		'title'				=> 'required|max:220',
		'oriented_to'	=> '',
		'contents'		=> ''
	);	

	public function coursedates() {
		return $this->hasMany('Coursedate');
	}
}