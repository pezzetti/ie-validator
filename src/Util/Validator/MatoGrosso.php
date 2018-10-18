<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class MatoGrosso implements ValidatorInterface
{
    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 11) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    protected static function calculaDigito($inscricaoEstadual)
    {
        $peso = 3;
        $posicao = 10;
        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $corpo = substr($inscricaoEstadual, 0, $length - 1);
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
            $dig = 0;
        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}