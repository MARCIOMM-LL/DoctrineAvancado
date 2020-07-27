<?php

namespace Alura\Doctrine\Helper;

use Alura\Doctrine\Type\TipoClassificacao;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function criaEntityManager(): EntityManagerInterface
    {
        $config = Setup::createXMLMetadataConfiguration(
            [__DIR__ . '/../../mapeamentos']
        );
        $con = [
            'driver' => 'pdo_pgsql',
            'host' => 'localhost',
            'dbname' => 'alura_filmes',
            'user' => 'postgres',
            'password' => 'senhalura',
        ];
        Type::addType(
            'classificacao',
            TipoClassificacao::class
        );
        $em = EntityManager::create($con, $config);
        $em->getConnection()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping(
                'CLASSIFICACAO',
                'classificacao'
            );

        return $em;
    }
}
