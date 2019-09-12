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
use Exception;

class MaskFactory {
    protected $states = [];

    public function __construct()
    {        
        $this->states =  [
            'AC' => Acre::class,
            'AL' => Alagoas::class,
            'AP' => Amapa::class,
            'AM' => Amazonas::class,
            'BA' => Bahia::class,
            'CE' => Ceara::class,
            'DF' => DistritoFederal::class,
            'ES' => EspiritoSanto::class,
            'GO' => Goias::class,
            'ES' => EspiritoSanto::class,
            'MA' => Maranhao::class,
            'MT' => MatoGrosso::class,
            'MS' => MatoGrossoDoSul::class,
            'MG' => MinasGerais::class,
            'PA' => Para::class,
            'PB' => Paraiba::class,
            'PE' => Pernambuco::class,
            'PI' => Piaui::class,            
            'PR' => Parana::class,
            'RJ' => RioDeJaneiro::class,
            'RN' => RioGrandeDoNorte::class,
            'RS' => RioGrandeDoSul::class,
            'RO' => Rondonia::class,
            'RR' => Roraima::class,
            'SC' => SantaCatarina::class,
            'SP' => SaoPaulo::class,
            'SE' => Sergipe::class,
            'TO' => Tocantins::class,
        ];
    }

    public function makeMaskFor($state) {    
        if(!array_key_exists($state, $this->states)) {
           throw new Exception('State not found');
        }  
        return new $this->states[$state];        
    }
}