<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Bahia extends StateValidator
{

    protected function checkLength(string $ie) : bool {	
        $length = strlen($ie);	        
		return $length == 9 || $length == 8;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool
    {
        $lenght = strlen($ie);
        $body = substr($ie, 0, $lenght - 2);
        $mod = $this->getMod($ie);
        $secondDigit = $this->calcDigit($body, $mod);
        $firstDigit = $this->calcDigit($body . $secondDigit, $mod);
        $pos2dig = strlen($ie) - 1;
        $pos1dig = strlen($ie) - 2;

        return $ie[$pos1dig] == $firstDigit && $ie[$pos2dig] == $secondDigit;
    }

    private function getMod($ie)
    {
        $length = strlen($ie);
        $position = 0;
        if ($length == 9) {
            $position = 1;
        }
        $char = substr($ie, $position, 1);
        if (in_array($char, [0, 1, 2, 3, 4, 5, 8], false)) {
            return 10;
        }
        return 11;
    }

    private function calcDigit($body, $mod)
    {
        $weight = strlen($body) + 1;

        $sum = 0;
        foreach (str_split($body) as $digit) {
            $sum += $digit * $weight;
            $weight--;
        }

        $rest = $sum % $mod;

        $dig = $mod - $rest;
        if ($dig >= 10) {
            $dig = 0;
        }

        return $dig;
    }
}