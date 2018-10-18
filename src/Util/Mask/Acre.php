<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Acre implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{2})(\d{3})(\d{3})(\d{3})(\d{2})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '.' .$inscricaoArr[2] . '.' .$inscricaoArr[3] . '/' .$inscricaoArr[4] . '-' . $inscricaoArr[5];
        }
        return $inscricaoEstadual;
    }

}