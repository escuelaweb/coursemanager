<?php

use LaravelBook\Ardent\Ardent;

class Course extends Ardent {
	protected $fillable = [];

	public function coursedates() {
		return $this->hasMany('Coursedate');
	}
}