<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Ceara extends StateValidator
{
    
	protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool
    {
        $sum = 0;
        $length = strlen($ie);
        $position = $length - 1;
        $weight = $length;
        $body = substr($ie, 0, $position);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
        }

        $rest = $sum % 11;

        $dig = 11 - $rest;
        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig == $ie[$position];
    }
}