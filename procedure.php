<?php

use Alura\Doctrine\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

$em = (new EntityManagerCreator())->criaEntityManager();

$rsm = new \Doctrine\ORM\Query\ResultSetMapping();
$rsm->addScalarResult('total_atores_por_categoria', 'total');

var_dump($em->createNativeQuery('SELECT total_atores_por_categoria(?, ?)', $rsm)
    ->setParameter(1, 4)
    ->getSingleScalarResult());

echo $total;