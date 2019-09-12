<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Pernambuco extends StateValidator
{

    protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool {

        $length = strlen($ie);
        $body = substr($ie, 0, $length - 2);

        $firstDigit = $this->calculaDigito($body);
        $secondDigit = $this->calculaDigito($body . $firstDigit);

        $pos2dig = strlen($ie) - 1;
        $pos1dig = strlen($ie) - 2;

        return $ie[$pos1dig] == $firstDigit && $ie[$pos2dig] == $secondDigit;
    }


    private function calculaDigito($body)
    {
        $weight = strlen($body) + 1;

        $sum = 0;
        foreach (str_split($body) as $digito) {
            $sum += $digito * $weight;
            $weight--;
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