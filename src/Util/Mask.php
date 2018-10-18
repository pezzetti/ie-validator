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

    public static function getIEForUF($estado, $inscricaoEstadual)
    {
        $estado = strtoupper($estado);
        
        switch ($estado) {
            case States::AC:
                $valid = Acre::getIE($inscricaoEstadual);
                break;
            case States::AL:
                $valid = Alagoas::getIE($inscricaoEstadual);
                break;
            case States::AP:
                $valid = Amapa::getIE($inscricaoEstadual);
                break;
            case States::AM:
                $valid = Amazonas::getIE($inscricaoEstadual);
                break;
            case States::BA:
                $valid = Bahia::getIE($inscricaoEstadual);
                break;
            case States::CE:
                $valid = Ceara::getIE($inscricaoEstadual);
                break;
            case States::DF:
                $valid = DistritoFederal::getIE($inscricaoEstadual);
                break;
            case States::ES:
                $valid = EspiritoSanto::getIE($inscricaoEstadual);
                break;
            case States::GO:
                $valid = Goias::getIE($inscricaoEstadual);
                break;
            case States::MA:
                $valid = Maranhao::getIE($inscricaoEstadual);
                break;
            case States::MT:
                $valid = MatoGrosso::getIE($inscricaoEstadual);
                break;
            case States::MS:
                $valid = MatoGrossoDoSul::getIE($inscricaoEstadual);
                break;
            case States::MG:
                $valid = MinasGerais::getIE($inscricaoEstadual);
                break;
            case States::PA:
                $valid = Para::getIE($inscricaoEstadual);
                break;
            case States::PB:
                $valid = Paraiba::getIE($inscricaoEstadual);
                break;
            case States::PR:
                $valid = Parana::getIE($inscricaoEstadual);
                break;
            case States::PE:
                $valid = Pernambuco::getIE($inscricaoEstadual);
                break;
            case States::PI:
                $valid = Piaui::getIE($inscricaoEstadual);
                break;
            case States::RJ:
                $valid = RioDeJaneiro::getIE($inscricaoEstadual);
                break;
            case States::RN:
                $valid = RioGrandeDoNorte::getIE($inscricaoEstadual);
                break;
            case States::RS:
                $valid = RioGrandeDoSul::getIE($inscricaoEstadual);
                break;
            case States::RO:
                $valid = Rondonia::getIE($inscricaoEstadual);
                break;
            case States::RR:
                $valid = Roraima::getIE($inscricaoEstadual);
                break;
            case States::SC:
                $valid = SantaCatarina::getIE($inscricaoEstadual);
                break;
            case States::SP:
                $valid = SaoPaulo::getIE($inscricaoEstadual);
                break;
            case States::SE:
                $valid = Sergipe::getIE($inscricaoEstadual);
                break;
            case States::TO:
                $valid = Tocantins::getIE($inscricaoEstadual);
                break;
            default:
                $valid = false;
        }
        return $valid;
    }
}
