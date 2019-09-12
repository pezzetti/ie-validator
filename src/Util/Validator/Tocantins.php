<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;
use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Tocantins extends StateValidator
{

    protected function calcIE(string $ie) : bool {
        return $this->checkOld($ie) || $this->checkNew($ie);
    }

    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 11 || strlen($ie) == 9;
    }
    
	protected function itStartsWith(string $ie) : bool {	  
        return true;
    }

    private function checkOld($ie) {
        $body = substr_replace($ie, '', 2, 2);              
        return $this->oldStartsWith($ie) && $this->calcOld($body);      
    }
    
    private function oldStartsWith($ie) {
        $categ = substr($ie, 2, 2);              
		return in_array($categ, ['01', '02', '03', '99']);
    }

    private function calcOld($ie) {
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

    private function checkNew($ie) {
        return $this->calcDigitNew($ie);
    }

    private function calcDigitNew($ie) {
        $weight = 9;
        $sum = 0;
        $length = strlen($ie);
        $position = $length - 1;
        $body = substr($ie, 0, $length - 1);
        foreach (str_split($body) as $item) {
            $sum += $item * $weight;
            $weight--;
        }

        $rest = $sum % 11;

        $dig = 11 - $rest;
        if ($rest < 2) {
            $dig = 0;
        }

        return $dig == $ie[$position];
    }
}