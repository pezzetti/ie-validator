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

    public static function check($estado, $inscricao_estadual)
    {
        $estado = strtoupper($estado);

        $inscricao_estadual = preg_replace( '/[^0-9]/', '', $inscricao_estadual);
        
        switch ($estado) {
            case States::AC:
                $valid = Acre::check($inscricao_estadual);
                break;
            case States::AL:
                $valid = Alagoas::check($inscricao_estadual);
                break;
            case States::AP:
                $valid = Amapa::check($inscricao_estadual);
                break;
            case States::AM:
                $valid = Amazonas::check($inscricao_estadual);
                break;
            case States::BA:
                $valid = Bahia::check($inscricao_estadual);
                break;
            case States::CE:
                $valid = Ceara::check($inscricao_estadual);
                break;
            case States::DF:
                $valid = DistritoFederal::check($inscricao_estadual);
                break;
            case States::ES:
                $valid = EspiritoSanto::check($inscricao_estadual);
                break;
            case States::GO:
                $valid = Goias::check($inscricao_estadual);
                break;
            case States::MA:
                $valid = Maranhao::check($inscricao_estadual);
                break;
            case States::MT:
                $valid = MatoGrosso::check($inscricao_estadual);
                break;
            case States::MS:
                $valid = MatoGrossoDoSul::check($inscricao_estadual);
                break;
            case States::MG:
                $valid = MinasGerais::check($inscricao_estadual);
                break;
            case States::PA:
                $valid = Para::check($inscricao_estadual);
                break;
            case States::PB:
                $valid = Paraiba::check($inscricao_estadual);
                break;
            case States::PR:
                $valid = Parana::check($inscricao_estadual);
                break;
            case States::PE:
                $valid = Pernambuco::check($inscricao_estadual);
                break;
            case States::PI:
                $valid = Piaui::check($inscricao_estadual);
                break;
            case States::RJ:
                $valid = RioDeJaneiro::check($inscricao_estadual);
                break;
            case States::RN:
                $valid = RioGrandeDoNorte::check($inscricao_estadual);
                break;
            case States::RS:
                $valid = RioGrandeDoSul::check($inscricao_estadual);
                break;
            case States::RO:
                $valid = Rondonia::check($inscricao_estadual);
                break;
            case States::RR:
                $valid = Roraima::check($inscricao_estadual);
                break;
            case States::SC:
                $valid = SantaCatarina::check($inscricao_estadual);
                break;
            case States::SP:
                $valid = SaoPaulo::check($inscricao_estadual);
                break;
            case States::SE:
                $valid = Sergipe::check($inscricao_estadual);
                break;
            case States::TO:
                $valid = Tocantins::check($inscricao_estadual);
                break;
            default:
                $valid = false;
        }
        return $valid;
    }
}
