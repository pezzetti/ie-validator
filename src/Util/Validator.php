<?php
namespace Pezzetti\InscricaoEstadual\Util;

use Pezzetti\InscricaoEstadual\Util\Validator\Acre;
use Pezzetti\InscricaoEstadual\Util\Validator\Alagoas;
use Pezzetti\InscricaoEstadual\Util\Validator\Amapa;
use Pezzetti\InscricaoEstadual\Util\Validator\Amazonas;
use Pezzetti\InscricaoEstadual\Util\Validator\Bahia;
use Pezzetti\InscricaoEstadual\Util\Validator\Ceara;
use Pezzetti\InscricaoEstadual\Util\Validator\DistritoFederal;
use Pezzetti\InscricaoEstadual\Util\Validator\EspiritoSanto;
use Pezzetti\InscricaoEstadual\Util\Validator\Goias;
use Pezzetti\InscricaoEstadual\Util\Validator\Maranhao;
use Pezzetti\InscricaoEstadual\Util\Validator\MatoGrosso;
use Pezzetti\InscricaoEstadual\Util\Validator\MatoGrossoDoSul;
use Pezzetti\InscricaoEstadual\Util\Validator\MinasGerais;
use Pezzetti\InscricaoEstadual\Util\Validator\Para;
use Pezzetti\InscricaoEstadual\Util\Validator\Paraiba;
use Pezzetti\InscricaoEstadual\Util\Validator\Parana;
use Pezzetti\InscricaoEstadual\Util\Validator\Pernambuco;
use Pezzetti\InscricaoEstadual\Util\Validator\Piaui;
use Pezzetti\InscricaoEstadual\Util\Validator\RioDeJaneiro;
use Pezzetti\InscricaoEstadual\Util\Validator\RioGrandeDoNorte;
use Pezzetti\InscricaoEstadual\Util\Validator\RioGrandeDoSul;
use Pezzetti\InscricaoEstadual\Util\Validator\Rondonia;
use Pezzetti\InscricaoEstadual\Util\Validator\Roraima;
use Pezzetti\InscricaoEstadual\Util\Validator\SantaCatarina;
use Pezzetti\InscricaoEstadual\Util\Validator\SaoPaulo;
use Pezzetti\InscricaoEstadual\Util\Validator\Sergipe;
use Pezzetti\InscricaoEstadual\Util\Validator\Tocantins;

class Validator
{

    public static function check($estado, $inscricaoEstadual)
    {
        $estado = strtoupper($estado);

        $inscricaoEstadual = preg_replace( '/[^0-9]/', '', $inscricaoEstadual);
        
        switch ($estado) {
            case States::AC:
                $valid = Acre::check($inscricaoEstadual);
                break;
            case States::AL:
                $valid = Alagoas::check($inscricaoEstadual);
                break;
            case States::AP:
                $valid = Amapa::check($inscricaoEstadual);
                break;
            case States::AM:
                $valid = Amazonas::check($inscricaoEstadual);
                break;
            case States::BA:
                $valid = Bahia::check($inscricaoEstadual);
                break;
            case States::CE:
                $valid = Ceara::check($inscricaoEstadual);
                break;
            case States::DF:
                $valid = DistritoFederal::check($inscricaoEstadual);
                break;
            case States::ES:
                $valid = EspiritoSanto::check($inscricaoEstadual);
                break;
            case States::GO:
                $valid = Goias::check($inscricaoEstadual);
                break;
            case States::MA:
                $valid = Maranhao::check($inscricaoEstadual);
                break;
            case States::MT:
                $valid = MatoGrosso::check($inscricaoEstadual);
                break;
            case States::MS:
                $valid = MatoGrossoDoSul::check($inscricaoEstadual);
                break;
            case States::MG:
                $valid = MinasGerais::check($inscricaoEstadual);
                break;
            case States::PA:
                $valid = Para::check($inscricaoEstadual);
                break;
            case States::PB:
                $valid = Paraiba::check($inscricaoEstadual);
                break;
            case States::PR:
                $valid = Parana::check($inscricaoEstadual);
                break;
            case States::PE:
                $valid = Pernambuco::check($inscricaoEstadual);
                break;
            case States::PI:
                $valid = Piaui::check($inscricaoEstadual);
                break;
            case States::RJ:
                $valid = RioDeJaneiro::check($inscricaoEstadual);
                break;
            case States::RN:
                $valid = RioGrandeDoNorte::check($inscricaoEstadual);
                break;
            case States::RS:
                $valid = RioGrandeDoSul::check($inscricaoEstadual);
                break;
            case States::RO:
                $valid = Rondonia::check($inscricaoEstadual);
                break;
            case States::RR:
                $valid = Roraima::check($inscricaoEstadual);
                break;
            case States::SC:
                $valid = SantaCatarina::check($inscricaoEstadual);
                break;
            case States::SP:
                $valid = SaoPaulo::check($inscricaoEstadual);
                break;
            case States::SE:
                $valid = Sergipe::check($inscricaoEstadual);
                break;
            case States::TO:
                $valid = Tocantins::check($inscricaoEstadual);
                break;
            default:
                $valid = false;
        }
        return $valid;
    }
}
