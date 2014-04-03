<?php

use LaravelBook\Ardent\Ardent;

class Role extends Ardent {
	protected $fillable = [];

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name'		=> 'required|alpha|unique:roles,name',
		'label'		=> 'required|alpha_dash|unique:roles,label'
	);

	public function users() {
		return $this->belongsToMany('User');
	}
}