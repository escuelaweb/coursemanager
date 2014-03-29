<?php

use LaravelBook\Ardent\Ardent;

class Classroom extends Ardent {
	protected $fillable = [];

	public function coursedates() {
		return $this->hasMany('Coursedate');
	}
}