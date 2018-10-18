<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Amazonas implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    private static function calculaDigito($inscricaoEstadual)
    {

        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $posicao = $length - 1;
        $peso = $length;
        $corpo = substr($inscricaoEstadual, 0, $posicao);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
        }
        if ($soma < 11) {
            $dig = 11 - $soma;
        } else {
            $resto = $soma % 11;
            $dig = 11 - $resto;

            if ($dig >= 10) {
                $dig = 0;
            }
        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}