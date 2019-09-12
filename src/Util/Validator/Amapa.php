<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;
use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Amapa extends StateValidator
{

    protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '03';
    }

    protected function calcIE(string $ie) : bool {

        $length = strlen($ie);
        $position = $length - 1;
        $weight = $length;
        $body = substr($ie, 0, $position);
        $p = 0;
        $d = 0;
        if ('03000001' <= $body && $body <= '03017000') {
            $p = 5;
            $d = 0;
        } elseif ('03017001' <= $body && $body <= '03019022') {
            $p = 9;
            $d = 1;
        }

        $sum = $p;
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
        }
        $dig = 11 - ($sum % 11);

        if ($dig == 10) {
            $dig = 0;
        }
        if ($dig == 11) {
            $dig = $d;
        }

        return $dig == $ie[$position];
    }
}