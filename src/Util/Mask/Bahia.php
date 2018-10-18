<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Bahia implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{6})(\d{2})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '-' .$inscricaoArr[2] ;
        }
        return $inscricaoEstadual;
    }

}