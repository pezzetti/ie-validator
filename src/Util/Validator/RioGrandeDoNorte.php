<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class RioGrandeDoNorte extends StateValidator
{
    protected function checkLength(string $ie) : bool {		    
        $length = strlen($ie);
        return $length == 9 || $length == 10;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '20';
    }

    protected function calcIE(string $ie) : bool {
        $sum = 0;
        $length = strlen($ie);
        $position = $length - 1;
        $weight = $length;
        $body = substr($ie, 0, $position);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
        }

        $dig = $sum * 10 % 11;
        if ($dig == 10) {
            $dig = 0;
        }
        return $dig == $ie[$position];
    }
}