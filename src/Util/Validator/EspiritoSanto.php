<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

class EspiritoSanto extends Ceara
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        // se não tiver 9 digitos não é valido
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }
}