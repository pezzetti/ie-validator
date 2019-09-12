<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Parana extends StateValidator
{

    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 10;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool {

        $length = strlen($ie);
        $body = substr($ie, 0, $length - 2);

        $firstDigit = $this->calcDigit($body);
        $secondDigit = $this->calcDigit($body . $firstDigit);

        $pos2dig = strlen($ie) - 1;
        $pos1dig = strlen($ie) - 2;

        return $ie[$pos1dig] == $firstDigit && $ie[$pos2dig] == $secondDigit;
    }

    private static function calcDigit($body)
    {
        $weight = strlen($body) - 5;

        $sum = 0;
        foreach (str_split($body) as $digit) {
            $sum += $digit * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 7;
            }
        }

        $mod = 11;
        $rest = $sum % $mod;

        $dig = $mod - $rest;
        if ($dig >= 10) {
            $dig = 0;
        }

        return $dig;
    }
}