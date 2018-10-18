<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class RioGrandeDoNorte implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        $length = strlen($inscricaoEstadual);
        if ($length != 9 && $length != 10) {
            $valid = false;
        }
        if ($valid && substr($inscricaoEstadual, 0, 2) != '20') {
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
        $peso = $length;
        $corpo = substr($inscricaoEstadual, 0, $posicao);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
        }

        $dig = $soma * 10 % 11;
        if ($dig == 10) {
            $dig = 0;
        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}