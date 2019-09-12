<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class SaoPaulo extends StateValidator
{
    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 12;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return true;
    }

    protected function calcIE(string $ie) : bool {
        $length = strlen($ie);
        $positionFirstDigit = $length - 4;
        $positionSecondDigit = $length - 1;

        $firstDigit = $this->calcFirstDigit($ie);

        $secondDigit = $this->calcSecondDigit($ie);

        return $firstDigit == $ie[$positionFirstDigit] && $secondDigit == $ie[$positionSecondDigit];
    }

    private function calcFirstDigit($ie) {
        $body = substr($ie, 0, 8);
        $weights = [1, 3, 4, 5, 6, 7, 8, 10];
        $sum = 0;
        foreach (str_split($body) as $i => $item) {
            $sum += ($item * $weights[$i]);
        }

        $dig = $sum % 11;

        $strDig = $dig . '';
        $length = strlen($strDig);

        return substr($dig, $length - 1, 1);
    }

    private function calcSecondDigit($ie) {
        $body = substr($ie, 0, 11);
        $weight = 3;
        $sum = 0;
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 10;
            }
        }

        $dig = $sum % 11;

        $strDig = $dig . '';
        $length = strlen($strDig);

        return substr($dig, $length - 1, 1);
    }
}