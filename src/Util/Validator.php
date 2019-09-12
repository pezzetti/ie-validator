<?php
namespace Pezzetti\InscricaoEstadual\Util;

class Validator
{
    public static function check($uf, $inscricaoEstadual)
    {        
        try {
            $uf = strtoupper($uf);
            $validatorFactory = new ValidatorFactory();
            $validator = $validatorFactory->makeValidatorFor($uf);              
            $inscricaoEstadual = preg_replace( '/[^0-9]/', '', $inscricaoEstadual);
            return $validator->isValidIE($inscricaoEstadual);          
        } catch (Exception $err) {
            throw $err;
        }  
    }      
}
