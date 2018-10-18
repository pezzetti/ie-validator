<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;

class MatoGrossoDoSul extends Ceara
{

    public static function check($inscricaoEstadual)
    {
        $valid = true;
        if (strlen($inscricaoEstadual) != 9) {
            $valid = false;
        }
        if ($valid && substr($inscricaoEstadual, 0, 2) != '28') {
            $valid = false;
        }
        if ($valid && !self::calculaDigito($inscricaoEstadual)) {
            $valid = false;
        }
        return $valid;

    }
}