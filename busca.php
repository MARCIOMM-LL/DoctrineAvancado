<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Repository\RepositorioAtores;
use Doctrine\DBAL\Logging\DebugStack;

require_once 'vendor/autoload.php';

$debug = new DebugStack();

$em = (new EntityManagerCreator())->criaEntityManager();
$em->getConfiguration()->setSQLLogger($debug);

/** @var RepositorioAtores $repositorioAtores */
$repositorioAtores = $em->getRepository(Ator::class);

$atoresMaisAtuantes = $repositorioAtores->buscaAtoresMaisAtuantes();

foreach ($atoresMaisAtuantes as $ator) {
    echo "O(a) ator/atriz {$ator['nome']} atuou em {$ator['qtdFilmes']} filmes" . PHP_EOL;
}

foreach ($debug->queries as $query) {
    var_dump($query);
}