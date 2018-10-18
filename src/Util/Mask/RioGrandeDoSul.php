<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class RioGrandeDoSul implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{3})(\d{7})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '/' . $inscricaoArr[2];
        }
        return $inscricaoEstadual;
    }

}