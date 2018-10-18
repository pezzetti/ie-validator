<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Bahia implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        $length = strlen($inscricaoEstadual);

        if ($length !== 9 && $length !== 8) {
            $valid = false;
        }
        if ($valid && !self::calculaDigitos($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    private static function calculaDigitos($inscricaoEstadual)
    {

        $length = strlen($inscricaoEstadual);
        $corpo = substr($inscricaoEstadual, 0, $length - 2);
        $modulo = self::getModulo($inscricaoEstadual);
        $_2dig = self::calculaDigito($corpo, $modulo);
        $_1dig = self::calculaDigito($corpo . $_2dig, $modulo);

        $pos2dig = strlen($inscricaoEstadual) - 1;

        $pos1dig = strlen($inscricaoEstadual) - 2;

        return $inscricaoEstadual[$pos1dig] == $_1dig && $inscricaoEstadual[$pos2dig] == $_2dig;
    }

    private static function getModulo($inscricaoEstadual)
    {
        $comprimento = strlen($inscricaoEstadual);
        $posicao = 0;
        if ($comprimento == 9) {
            $posicao = 1;
        }
        $char = substr($inscricaoEstadual, $posicao, 1);
        if (in_array($char, [0, 1, 2, 3, 4, 5, 8], false)) {
            return 10;
        }
        return 11;
    }

    private static function calculaDigito($corpo, $modulo)
    {
        $peso = strlen($corpo) + 1;

        $soma = 0;
        foreach (str_split($corpo) as $digito) {
            $soma += $digito * $peso;
            $peso--;
        }

        $resto = $soma % $modulo;

        $dig = $modulo - $resto;
        if ($dig >= 10) {
            $dig = 0;
        }

        return $dig;
    }
}