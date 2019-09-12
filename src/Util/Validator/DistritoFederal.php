<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class DistritoFederal extends StateValidator
{

    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 13;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '07';
    }

    protected function calcIE(string $ie) : bool
    {

        $length = strlen($ie);
        $body = substr($ie, 0, $length - 2);

        $_1dig = $this->calcDigit($body);
        $_2dig = $this->calcDigit($body . $_1dig);

        $pos2dig = strlen($ie) - 1;
        $pos1dig = strlen($ie) - 2;

        return $ie[$pos1dig] == $_1dig && $ie[$pos2dig] == $_2dig;
    }

    private function calcDigit($body)
    {
        $weight = strlen($body) - 7;

        $sum = 0;
        foreach (str_split($body) as $digit) {
            $sum += $digit * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 9;
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