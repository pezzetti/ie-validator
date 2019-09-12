<?php
namespace Pezzetti\InscricaoEstadual\Util;


interface MaskInterface
{
    public function getMaskForIE(string $ie) : string;
}