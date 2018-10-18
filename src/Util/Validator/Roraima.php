<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Roraima implements ValidatorInterface
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

    protected static function calculaDigito($inscricaoEstadual)
    {
        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $posicao = $length - 1;
        $peso = 1;
        $corpo = substr($inscricaoEstadual, 0, $posicao);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso++;
        }

        $dig = $soma % 9;

        return $dig == $inscricaoEstadual[$posicao];
    }
}