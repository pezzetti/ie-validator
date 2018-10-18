<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

use Pezzetti\InscricaoEstadual\Util\ValidatorInterface;

class Goias implements ValidatorInterface
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        $inicio = substr($inscricaoEstadual, 0, 2);
        if ($valid && !in_array($inicio, ['10', '11', '15'])) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }

    protected static function calculaDigito($inscricaoEstadual)
    {
        $peso = 9;
        $posicao = 8;
        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $corpo = substr($inscricaoEstadual, 0, $length - 1);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
        }

        $resto = $soma % 11;

        $dig = 11 - $resto;

        if ($dig >= 10) {
            if ($dig == 11 && '10103105' <= $corpo && $corpo <= '10119997') {
                $dig = 1;
            } else {
                $dig = 0;
            }

        }
        return $dig == $inscricaoEstadual[$posicao];
    }
}