<?php

namespace Alura\Doctrine\Entity;

class Idioma
{
    private $id;
    private $nome;
    private $ultimaAtualizacao;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->ultimaAtualizacao = new \DateTimeImmutable();
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}
