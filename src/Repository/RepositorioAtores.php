<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Ator;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class RepositorioAtores extends EntityRepository
{
    public function buscaAtoresMaisAtuantesOld()
    {
        return $this->createQueryBuilder('a')
            ->join('a.filmes', 'f')
            ->addSelect('f')
            ->getQuery()
            ->getResult();
    }

    public function buscaAtoresMaisAtuantes()
    {
        $sql = 'SELECT * FROM atores_mais_atuantes;';
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nome', 'nome');
        $rsm->addScalarResult('qtd_filmes', 'qtdFilmes');

        return $this->getEntityManager()
            ->createNativeQuery($sql, $rsm)
            ->getResult();
    }

    public function buscaTodosAtores()
    {
        $sql = 'SELECT id_ator, primeiro_nome, ultimo_nome FROM ator;';
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult(Ator::class, 'ator');
        $rsm->addFieldResult('ator', 'id_ator', 'id');
        $rsm->addFieldResult('ator', 'primeiro_nome', 'primeiroNome');
        $rsm->addFieldResult('ator', 'ultimo_nome', 'ultimoNome');

        return $this->getEntityManager()
            ->createNativeQuery($sql, $rsm)
            ->getResult();
    }
}
