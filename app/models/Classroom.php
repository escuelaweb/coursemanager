<?php

use LaravelBook\Ardent\Ardent;

class Classroom extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules	= array(
		'name'		=> 'required|max:100',
		'address'	=> 'required|max:255',
		'lat'			=> 'numeric',
		'long'		=> 'numeric'
	);

	public function coursedates() {
		return $this->hasMany('Coursedate');
	}
}