<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Parana implements MaskInterface
{

    public function getMaskForIE(string $inscricaoEstadual) : string {
        if(preg_match( '/^(\d{3})(\d{5})(\d{2})$/', $inscricaoEstadual,  $inscricaoArr )) {
            return $inscricaoArr[1] . '.' . $inscricaoArr[2] . '-' . $inscricaoArr[3] ;
        }
        return $inscricaoEstadual;
    }

}