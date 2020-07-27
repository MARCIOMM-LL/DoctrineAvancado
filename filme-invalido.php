<?php

use Alura\Doctrine\Entity\ClassificacaoEnum;
use Alura\Doctrine\Entity\Filme;

require_once 'vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();

$portugues = new \Alura\Doctrine\Entity\Idioma(null, 'Português');
$filme = new Filme(
    null,
    'Teste',
    $portugues,
    $portugues,
    null,
    '2019',
    ClassificacaoEnum::LIVRE()
);

$em->persist($filme);
$em->flush();
