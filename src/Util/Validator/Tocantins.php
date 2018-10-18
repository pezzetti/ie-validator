<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;


class Tocantins extends Ceara
{

    public static function check($inscricaoEstadual)
    {
        return static::checkOld($inscricaoEstadual) || static::checkNew($inscricaoEstadual);
    }

    protected static function checkOld($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 11) {
            $valid = false;
        }
        if ($valid) {
            $categoria = substr($inscricaoEstadual, 2, 2);
            if (!in_array($categoria, ['01', '02', '03', '99'])) {
                $valid = false;
            }
            $corpo = substr_replace($inscricaoEstadual, '', 2, 2);
        }

        if ($valid && !self::calculaDigito($corpo)) {
            $valid = false;
        }
        return $valid;

    }

      protected static function checkNew($inscricaoEstadual)
    {
        return strlen($inscricaoEstadual) == 9 && static::calculaDigitoNova($inscricaoEstadual);
    }


    protected static function calculaDigitoNova($inscricaoEstadual)
    {
        $peso = 9;
        $soma = 0;
        $length = strlen($inscricaoEstadual);
        $posicao = $length - 1;
        $corpo = substr($inscricaoEstadual, 0, $length - 1);
        foreach (str_split($corpo) as $item) {
            $soma += $item * $peso;
            $peso--;
        }

        $resto = $soma % 11;

        $dig = 11 - $resto;
        if ($resto < 2) {
            $dig = 0;
        }

        return $dig == $inscricaoEstadual[$posicao];
    }
}