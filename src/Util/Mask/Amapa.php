<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Amapa implements MaskInterface
{
   public static function getIE($inscricaoEstadual)
    {
        return $inscricaoEstadual;
    }
}