<?php

namespace Pezzetti\InscricaoEstadual\Util\Validator;


class Paraiba extends Ceara
{
    public static final function check($inscricaoEstadual)
    {
        return parent::check((string)$inscricaoEstadual);
    }

}