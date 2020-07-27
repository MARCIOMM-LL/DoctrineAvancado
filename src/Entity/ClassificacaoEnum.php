<?php

namespace Alura\Doctrine\Entity;

use MyCLabs\Enum\Enum;

class ClassificacaoEnum extends Enum
{
    private const LIVRE = 'G';
    private const ACIMA_10_ANOS = 'PG';
    private const ACIMA_13_ANOS = 'PG-13';
    private const ACIMA_16_ANOS = 'R';
    private const ACIMA_18_ANOS = 'NC-17';
}
