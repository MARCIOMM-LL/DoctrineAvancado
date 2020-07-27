<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Entity\ClassificacaoEnum;
use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Entity\Idioma;

require_once 'vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();

$ator = new Ator(null, 'Vinicius', 'Dias');
$atriz = new Ator(null, 'Maria', 'da Silva');

$portugues = new Idioma(null, 'Português');
$alemao = new Idioma(null, 'Alemão');
$ingles = new Idioma(null, 'Inglês');

$filme1 = new Filme(null, 'A volta dos que não foram', $portugues, $alemao, null, null, ClassificacaoEnum::LIVRE());
$filme2 = new Filme(null, 'As longas tranças do careca', $portugues, $ingles, null, null, ClassificacaoEnum::ACIMA_13_ANOS());

$ator->addFilme($filme1);
$ator->addFilme($filme2);

$filme1->addAtor($atriz);

$em->persist($atriz);
$em->persist($ator);

$em->flush();
