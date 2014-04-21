<?php

class AvantValidator extends Illuminate\Validation\Validator {

	public function validateRut($attribute, $value, $parameters) {
		$fullRut = str_replace('.', '', $value);

		if(strlen($fullRut) == 10) {
			$rut 							= substr($fullRut, 0, 8);
			$verDigit					= substr($fullRut, -1);
			$verSeries				= array(2,3,4,5,6,7);
			$verSeriesCount	= count($verSeries);

			for($i = 0, $sum = 0, $mod = 100; $rut != 0 || $mod != 0; $rut /= 10, $i++ ) {
				$mod  = $rut % 10;
				
				$i = ($i < $verSeriesCount) ? $i : 0;

				$sum += $mod * $verSeries[$i];
			}

			$mod11 							= $sum % 11;
			$calculatedVerDigit = 11 - $mod11;

			if($calculatedVerDigit == 11) {
				$calculatedVerDigit = 0;
			}
			elseif($calculatedVerDigit == 10) {
				$calculatedVerDigit = 'K';
			}

			if($verDigit == $calculatedVerDigit) {
				return true;
			}
			else {
				return false;
			}

		}else {
			return false;
		}
	}
}