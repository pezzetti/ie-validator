<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Amazonas implements MaskInterface
{

    public static function getIE($inscricaoEstadual)
    {
        if(preg_match( '/^(\d{2})(\d{3})(\d{3})(\d{1})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '.' .$inscricaoArr[2] . '.' .$inscricaoArr[3] . '-' .$inscricaoArr[4];
        }
        return $inscricaoEstadual;
    }

}