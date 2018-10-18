<?php

namespace Pezzetti\InscricaoEstadual\TestCase;

use PHPUnit\Framework\TestCase;
use Pezzetti\InscricaoEstadual\Util\States;
use Pezzetti\InscricaoEstadual\Util\Mask;

class MaskTest extends TestCase
{
    public function testMaskAcre() {
        self::assertEquals('01.116.205/876-03', Mask::getIEForUF(States::AC, '0111620587603'));
    }

    public function testMaskAlagoas() {
        self::assertEquals('248713590', Mask::getIEForUF(States::AL, '248713590'));
    }

    public function testMaskAmapa() {
        self::assertEquals('039880109', Mask::getIEForUF(States::AP, '039880109'));
    }

    public function testMaskAmazonas() {
        self::assertEquals('48.020.565-5', Mask::getIEForUF(States::AM, '480205655'));
    }

    public function testMaskBahia() {
        self::assertEquals('195276-73', Mask::getIEForUF(States::BA, '19527673'));
    }

    public function testMaskCeara() {
        self::assertEquals('88817459-4', Mask::getIEForUF(States::CE, '888174594'));
    }

    public function testMaskDistritoFederal() {
        self::assertEquals('07038220001-39', Mask::getIEForUF(States::DF, '0703822000139'));
    }

    public function testMaskEspiritoSanto() {
        self::assertEquals('83507980-5', Mask::getIEForUF(States::ES, '835079805'));
    }

    public function testMaskGoias() {
        self::assertEquals('10.032.202-6', Mask::getIEForUF(States::GO, '100322026'));
    }

    public function testMaskMaranhao() {
        self::assertEquals('12985579-0', Mask::getIEForUF(States::MA, '129855790'));
    }

    public function testMaskMatoGrosso() {
        self::assertEquals('0796094094-1', Mask::getIEForUF(States::MT, '07960940941'));
    }

    public function testMaskMatoGrossoDoSul() {
        self::assertEquals('28108717-2', Mask::getIEForUF(States::MS, '281087172'));
    }

    public function testMaskMinasGerais() {
        self::assertEquals('315.618.259/9499', Mask::getIEForUF(States::MG, '3156182599499'));
    }

    public function testMaskPara() {
        self::assertEquals('15-758413-5', Mask::getIEForUF(States::PA, '157584135'));
    }

    public function testMaskParaiba() {
        self::assertEquals('17161435-6', Mask::getIEForUF(States::PB, '171614356'));
    }

    public function testMaskParana() {
        self::assertEquals('828.41756-80', Mask::getIEForUF(States::PR, '8284175680'));
    }

    public function testMaskPernambuco() {
        self::assertEquals('3083331-01', Mask::getIEForUF(States::PE, '308333101'));
    }

    public function testMaskPiaui() {
        self::assertEquals('54281652-0', Mask::getIEForUF(States::PI, '542816520'));
    }

    public function testMaskRioDeJaneiro() {
        self::assertEquals('77.210.31-8', Mask::getIEForUF(States::RJ, '77210318'));
    }

    public function testMaskRioGrandeDoNorte() {
        self::assertEquals('20.864.873-9', Mask::getIEForUF(States::RN, '208648739'));
    }

    public function testMaskRioGrandeDoSul() {
        self::assertEquals('468/2804960', Mask::getIEForUF(States::RS, '4682804960'));
    }

    public function testMaskRondonia() {
        self::assertEquals('7185850839221-7', Mask::getIEForUF(States::RO, '71858508392217'));
    }

    public function testMaskRoraima() {
        self::assertEquals('24747624-2', Mask::getIEForUF(States::RR, '247476242'));
    }

    public function testMaskSantaCatarina() {
        self::assertEquals('833.072.897', Mask::getIEForUF(States::SC, '833072897'));
    }

    public function testMaskSaoPaulo() {
        self::assertEquals('011.208.762.669', Mask::getIEForUF(States::SP, '011208762669'));
    }

    public function testMaskSergipe() {
        self::assertEquals('96695497-1', Mask::getIEForUF(States::SE, '966954971'));
    }

    public function testMaskTocantins() {
        self::assertEquals('5503892662-2', Mask::getIEForUF(States::TO, '55038926622'));
    }
}