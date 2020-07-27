<?php

namespace Alura\Doctrine\Type;

use Alura\Doctrine\Entity\ClassificacaoEnum;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TipoClassificacao extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'CLASSIFICACAO';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        switch ($value) {
            case 'G':
                return ClassificacaoEnum::LIVRE();
            case 'PG':
                return ClassificacaoEnum::ACIMA_10_ANOS();
            case 'PG-13':
                return ClassificacaoEnum::ACIMA_13_ANOS();
            case 'R':
                return ClassificacaoEnum::ACIMA_16_ANOS();
            case 'NC-17':
                return ClassificacaoEnum::ACIMA_18_ANOS();
        }
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof ClassificacaoEnum) {
            throw new \DomainException('Classificação inválida');
        }

        return $value->getValue();
    }

    public function getName()
    {
        return 'classificacao';
    }
}
