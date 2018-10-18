<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;


use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Alagoas implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        if ($valid && substr($inscricaoEstadual, 0, 2) != '24') {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    private static function calculaDigito($inscricaoEstadual)
    {

        $peso = 9;
        $posicao = 8;
        $soma = 0;
        for ($i = 0; $i < $posicao; $i++) {
            $soma += $inscricaoEstadual[$i] * $peso;
            $peso--;
        }
        $produto = $soma * 10;
        $dig = $produto - (((int)($produto / 11)) * 11);

        if ($dig >= 10) {
            $dig = 0;
        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}