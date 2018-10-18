<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Para implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{2})(\d{6})(\d{1})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '-' . $inscricaoArr[2] . '-' . $inscricaoArr[3] ;
        }
        return $inscricaoEstadual;
    }

}