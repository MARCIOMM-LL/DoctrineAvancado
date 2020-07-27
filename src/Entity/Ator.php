<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Ator extends Pessoa
{
    private $filmes;

    public function __construct(
        ?int $id,
        string $primeiroNome,
        string $ultimoNome
    ) {
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
