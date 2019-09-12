<?php

namespace Pezzetti\InscricaoEstadual\Util;

use Pezzetti\InscricaoEstadual\Util\Mask\Acre;
use Pezzetti\InscricaoEstadual\Util\Mask\Alagoas;
use Pezzetti\InscricaoEstadual\Util\Mask\Amapa;
use Pezzetti\InscricaoEstadual\Util\Mask\Amazonas;
use Pezzetti\InscricaoEstadual\Util\Mask\Bahia;
use Pezzetti\InscricaoEstadual\Util\Mask\Ceara;
use Pezzetti\InscricaoEstadual\Util\Mask\DistritoFederal;
use Pezzetti\InscricaoEstadual\Util\Mask\EspiritoSanto;
use Pezzetti\InscricaoEstadual\Util\Mask\Goias;
use Pezzetti\InscricaoEstadual\Util\Mask\Maranhao;
use Pezzetti\InscricaoEstadual\Util\Mask\MatoGrosso;
use Pezzetti\InscricaoEstadual\Util\Mask\MatoGrossoDoSul;
use Pezzetti\InscricaoEstadual\Util\Mask\MinasGerais;
use Pezzetti\InscricaoEstadual\Util\Mask\Para;
use Pezzetti\InscricaoEstadual\Util\Mask\Paraiba;
use Pezzetti\InscricaoEstadual\Util\Mask\Parana;
use Pezzetti\InscricaoEstadual\Util\Mask\Pernambuco;
use Pezzetti\InscricaoEstadual\Util\Mask\Piaui;
use Pezzetti\InscricaoEstadual\Util\Mask\RioDeJaneiro;
use Pezzetti\InscricaoEstadual\Util\Mask\RioGrandeDoNorte;
use Pezzetti\InscricaoEstadual\Util\Mask\RioGrandeDoSul;
use Pezzetti\InscricaoEstadual\Util\Mask\Rondonia;
use Pezzetti\InscricaoEstadual\Util\Mask\Roraima;
use Pezzetti\InscricaoEstadual\Util\Mask\SantaCatarina;
use Pezzetti\InscricaoEstadual\Util\Mask\SaoPaulo;
use Pezzetti\InscricaoEstadual\Util\Mask\Sergipe;
use Pezzetti\InscricaoEstadual\Util\Mask\Tocantins;

class Mask
{

    public static function getIEForUF($uf, $inscricaoEstadual) : string {
        $uf = strtoupper($uf);
        $maskFactory = new MaskFactory();
        $mask = $maskFactory->makeMaskFor($uf);            
        return $mask->getMaskForIE($inscricaoEstadual);  
    }
}
