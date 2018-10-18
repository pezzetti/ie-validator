<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Amapa implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        if ($valid && substr($inscricaoEstadual, 0, 2) != '03') {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    private static function calculaDigito($inscricaoEstadual)
    {

        $length = strlen($inscricaoEstadual);
        $posicao = $length - 1;
        $peso = $length;
        $corpo = substr($inscricaoEstadual, 0, $posicao);
        $p = 0;
        $d = 0;
        if ('03000001' <= $corpo && $corpo <= '03017000') {
            $p = 5;
            $d = 0;
        } elseif ('03017001' <= $corpo && $corpo <= '03019022') {
            $p = 9;
            $d = 1;
        }

        $soma = $p;
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
        }
        $dig = 11 - ($soma % 11);

        if ($dig == 10) {
            $dig = 0;
        }
        if ($dig == 11) {
            $dig = $d;
        }

        return $dig == $inscricaoEstadual[$posicao];
    }
}