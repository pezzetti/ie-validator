<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class MinasGerais implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 13) {
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
        $pos_1dig = $length - 2;
        $pos_2dig = $length - 1;

        $corpo = substr($inscricaoEstadual, 0, 11);

        $_1dig = self::calculaPrimeiroDigito($corpo);
        $_2dig = self::calculaSegundoDigito($corpo . $_1dig);

        return $_1dig == $inscricaoEstadual[$pos_1dig] && $_2dig == $inscricaoEstadual[$pos_2dig];
    }

    private static function calculaPrimeiroDigito($corpo)
    {
        $corpo = substr_replace($corpo, '0', 3, 0);
        $concatenacao = "";
        foreach (str_split($corpo) as $i => $item) {
            $peso = ((($i + 3) % 2) == 0) ? 2 : 1;
            $concatenacao .= ($item * $peso);
        }
        $soma = 0;

        foreach (str_split($concatenacao) as $algarismo) {
            $soma += $algarismo;
        }
        $strSoma = $soma . '';
        $length = strlen($strSoma);
        $last_char = substr($strSoma, $length - 1, 1);

        return ($last_char == 0) ? 0 : (10 - $last_char);
    }

    private static function calculaSegundoDigito($corpo)
    {
        $peso = 3;
        $soma = 0;
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
            if ($peso == 1) {
                $peso = 11;
            }
        }

        $resto = $soma % 11;
        $dig = 11 - $resto;

        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig;
    }
}