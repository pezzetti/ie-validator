<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Rondonia implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 14) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    protected static function calculaDigito($inscricaoEstadual)
    {
        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $posicao = $length - 1;
        $peso = 6;
        $corpo = substr($inscricaoEstadual, 0, $posicao);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
            if ($peso == 1) {
                $peso = 9;
            }
        }

        $resto = $soma % 11;
        $dig = 11 - $resto;

        if ($dig >= 10) {
            $dig -= 10;
        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}