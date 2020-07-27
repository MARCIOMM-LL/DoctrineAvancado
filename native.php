<?php

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\DBAL\Logging\DebugStack;

require_once 'vendor/autoload.php';

$em = (new EntityManagerCreator())->criaEntityManager();
$debug = new DebugStack();
$em->getConfiguration()->setSQLLogger($debug);

/** @var \Alura\Doctrine\Repository\RepositorioAtores $repositorio */
$repositorio = $em->getRepository(\Alura\Doctrine\Entity\Ator::class);

$atores = $repositorio->buscaTodosAtores();

foreach ($atores as $ator) {
    echo "Ator {$ator->getNome()}" . PHP_EOL;
}

foreach ($debug->queries as $query) {
    var_dump($query);
}