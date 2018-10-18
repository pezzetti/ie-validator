<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class SaoPaulo implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 12) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;
    }

    protected static function calculaDigito($inscricaoEstadual)
    {
        $length = strlen($inscricaoEstadual);
        $pos_1dig = $length - 4;
        $pos_2dig = $length - 1;

        $_1dig = self::calculaPrimeiroDigito($inscricaoEstadual);

        $_2dig = self::calculaSegundoDigito($inscricaoEstadual);

        return $_1dig == $inscricaoEstadual[$pos_1dig] && $_2dig == $inscricaoEstadual[$pos_2dig];
    }

    private static function calculaPrimeiroDigito($inscricaoEstadual)
    {
        $corpo = substr($inscricaoEstadual, 0, 8);
        $pesos = [1, 3, 4, 5, 6, 7, 8, 10];
        $soma = 0;
        foreach (str_split($corpo) as $i => $item) {
            $soma += ($item * $pesos[$i]);
        }

        $dig = $soma % 11;

        $strDig = $dig . '';
        $length = strlen($strDig);

        return substr($dig, $length - 1, 1);
    }

    private static function calculaSegundoDigito($inscricaoEstadual)
    {
        $corpo = substr($inscricaoEstadual, 0, 11);
        $peso = 3;
        $soma = 0;
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
            if ($peso == 1) {
                $peso = 10;
            }
        }

        $dig = $soma % 11;

        $strDig = $dig . '';
        $length = strlen($strDig);

        return substr($dig, $length - 1, 1);
    }
}