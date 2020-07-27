<?php

namespace Alura\Doctrine\Entity;

abstract class Pessoa
{
    protected $id;
    protected $primeiroNome;
    protected $ultimoNome;
    protected $ultimaAtualizacao;

    public function __construct(
        ?int $id,
        string $primeiroNome,
        string $ultimoNome
    ) {
        $this->id = $id;
        $this->primeiroNome = $primeiroNome;
        $this->ultimoNome = $ultimoNome;
        $this->ultimaAtualizacao = new \DateTimeImmutable();
    }

    public function getNome(): string
    {
        return $this->primeiroNome . ' ' . $this->ultimoNome;
    }
}
