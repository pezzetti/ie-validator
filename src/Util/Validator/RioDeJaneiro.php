<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class RioDeJaneiro extends StateValidator
{
    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 8;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool {
        $weight = 2;
        $sum = 0;
        $length = strlen($ie);
        $position = $length - 1;
        $body = substr($ie, 0, $length - 1);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 7;
            }
        }

        $rest = $sum % 11;
        $dig = 11 - $rest;
        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig == $ie[$position];
    }
}