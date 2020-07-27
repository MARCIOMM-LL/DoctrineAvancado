<?php

namespace Alura\Doctrine\Entity;

use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Entity\Pessoa;
use Doctrine\Common\Collections\ArrayCollection;

class Ator extends Pessoa
{
    private $filmes;

    public function __construct(
        ?int $id,
        string $primeiroNome,
        string $ultimoNome
    )
    {
        // A propriedade parent chama o contrutor da classe base
        parent::__construct($id, $primeiroNome, $ultimoNome);
        $this->filmes = new ArrayCollection();
    }

    public function addFilme(Filme $filme): void
    {
        if ($this->filmes->contains($filme)) {
            return;
        }

        $this->filmes->add($filme);
        $filme->addAtor($this);
    }

    public function quantidadeFilmes(): int
    {
        return $this->filmes->count();
    }
}
