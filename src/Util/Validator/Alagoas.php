<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;
use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Alagoas extends StateValidator
{
	protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '24';
    }

    protected function calcIE(string $ie) : bool
    {
        $weight = 9;
        $position = 8;
        $sum = 0;
        for ($i = 0; $i < $position; $i++) {
            $sum += $ie[$i] * $weight;
            $weight--;
        }
        $product = $sum * 10;
        $dig = $product - (((int)($product / 11)) * 11);

        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig == $ie[$position];
    }
}