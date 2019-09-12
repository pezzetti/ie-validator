<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Roraima extends StateValidator
{    
	protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '24';
    }

    protected function calcIE(string $ie) : bool {
        $sum = 0;
        $length = strlen($ie);
        $position = $length - 1;
        $weight = 1;
        $body = substr($ie, 0, $position);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight++;
        }

        $dig = $sum % 9;

        return $dig == $ie[$position];
    }
}