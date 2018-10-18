<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Pernambuco implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) !== 9) {
            $valid = false;
        }
        if ($valid && !self::calculaDigitos($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    protected static function calculaDigitos($inscricaoEstadual)
    {

        $length = strlen($inscricaoEstadual);
        $corpo = substr($inscricaoEstadual, 0, $length - 2);

        $_1dig = self::calculaDigito($corpo);
        $_2dig = self::calculaDigito($corpo . $_1dig);

        $pos2dig = strlen($inscricaoEstadual) - 1;
        $pos1dig = strlen($inscricaoEstadual) - 2;

        return $inscricaoEstadual[$pos1dig] == $_1dig && $inscricaoEstadual[$pos2dig] == $_2dig;
    }


    private static function calculaDigito($corpo)
    {
        $peso = strlen($corpo) + 1;

        $soma = 0;
        foreach (str_split($corpo) as $digito) {
            $soma += $digito * $peso;
            $peso--;
        }

        $modulo = 11;
        $resto = $soma % $modulo;

        $dig = $modulo - $resto;
        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig;
    }
}