<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class MinasGerais extends StateValidator
{

    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 13;
    }

    protected function itStartsWith(string $ie) : bool {	                
		return true;
    }
    
    protected function calcIE(string $ie) : bool {
        $length = strlen($ie);
        $posFirstDigit = $length - 2;
        $posSecondDigit = $length - 1;

        $body = substr($ie, 0, 11);

        $firstDigit = $this->calcFirstDigit($body);
        $secondDigit = $this->calcSecondDigit($body . $firstDigit);

        return $firstDigit == $ie[$posFirstDigit] && $secondDigit == $ie[$posSecondDigit];
    }

    private function calcFirstDigit($body) {       
        $body = substr_replace($body, '0', 3, 0);
        $concatenate = "";
        $count = 0;     
        foreach (str_split($body) as $i => $item) {
            $count++;
            $weight = ((($i + 3) % 2) == 0) ? 2 : 1;           
            $concatenate .= ($item * $weight);
        }        
        $sum = 0;

        foreach (str_split($concatenate) as $algarismo) {
            $sum += $algarismo;
        }
        $strSum = $sum . '';
        $length = strlen($strSum);
        $lastChar = substr($strSum, $length - 1, 1);

        return ($lastChar == 0) ? 0 : (10 - $lastChar);
    }

    private function calcSecondDigit($body) {
        $weight = 3;
        $sum = 0;
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 11;
            }
        }

        $rest = $sum % 11;
        $dig = 11 - $rest;

        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig;
    }
}