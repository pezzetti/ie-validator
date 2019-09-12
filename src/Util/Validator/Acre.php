<?php
namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\Validator\StateValidator;

class Acre extends StateValidator
{

    protected function checkLength(string $ie) : bool {		        
		return strlen($ie) == 13;
    }
    
	protected function itStartsWith(string $ie) : bool {	                
		return substr($ie, 0, 2) == '01';
    }

    protected function calcIE(string $ie) : bool
    {

        $length = strlen($ie);
        $body = substr($ie, 0, $length - 2);

        $firstDigit = $this->calcDigit($body);
        $secondDigit = $this->calcDigit($body . $firstDigit);

        $pos2dig = strlen($ie) - 1;
        $pos1dig = strlen($ie) - 2;

        return $ie[$pos1dig] == $firstDigit && $ie[$pos2dig] == $secondDigit;
    }

    private function calcDigit($body)
    {
        $weight = strlen($body) - 7;

        $soma = 0;
        foreach (str_split($body) as $digito) {
            $soma += $digito * $weight;
            $weight--;
            if ($weight == 1) {
                $weight = 9;
            }
        }

        $mod = 11;
        $rest = $soma % $mod;
        $dig = $mod - $rest;
        if ($dig >= 10) {
            $dig = 0;
        }

        return $dig;
    }
}