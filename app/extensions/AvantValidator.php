<?php

class AvantValidator extends Illuminate\Validation\Validator {

	public function validateRut($attribute, $value, $parameters) {
		if($value == 5) {
			return true;
		}
		else {
			return false;
		}
	}
}