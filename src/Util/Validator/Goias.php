<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Goias extends StateValidator
{
    
	protected function itStartsWith(string $ie) : bool {
        $begin = substr($ie, 0, 2);	                
		return in_array($begin, ['10', '11', '15']);
    }

    protected function calcIE(string $ie) : bool
    {
        $weight = 9;
        $position = 8;
        $sum = 0;
        $length = strlen($ie);
        $body = substr($ie, 0, $length - 1);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
        }

        $rest = $sum % 11;

        $dig = 11 - $rest;

        if ($dig >= 10) {
            if ($dig == 11 && '10103105' <= $body && $body <= '10119997') {
                $dig = 1;
            } else {
                $dig = 0;
            }

        }
        return $dig == $ie[$position];
    }
}