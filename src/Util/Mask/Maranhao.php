<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Maranhao implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{8})(\d{1})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '-' . $inscricaoArr[2];
        }
        return $inscricaoEstadual;
    }

}