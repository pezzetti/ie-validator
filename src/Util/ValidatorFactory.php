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
use Exception;

class ValidatorFactory {
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

    public function makeValidatorFor($state) {    
        if(!array_key_exists($state, $this->states)) {
           throw new Exception('State not found');
        }  
        return new $this->states[$state];        
    }
}