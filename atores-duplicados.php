<?php

use Alura\Doctrine\Entity\Ator;

require_once 'vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();

$ator1 = new Ator(null, 'Vinicius', 'Dias');
$ator2 = new Ator(null, 'Vinicius', 'Dias');

$em->persist($ator1);
$em->flush();

$em->persist($ator2);
$em->flush();
