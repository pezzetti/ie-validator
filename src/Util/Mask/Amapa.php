<?php

namespace Pezzetti\InscricaoEstadual\Util\Mask;

use Pezzetti\InscricaoEstadual\Util\MaskInterface;

class Amapa implements MaskInterface
{
    public function getMaskForIE(string $inscricaoEstadual) : string {
        return $inscricaoEstadual;
    }
}