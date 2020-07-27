<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Filme
{
    private $id;
    private $titulo;
    private $sinopse;
    private $anoLancamento;
    private $ultimaAtualizacao;
    private $classificacao;
    private $idiomaAudio;
    private $idiomaOriginal;
    private $atores;

    public function __construct(
        ?int $id,
        string $titulo,
        Idioma $idiomaAudio,
        Idioma $idiomaOriginal,
        ?string $sinopse = null,
        ?string $anoLancamento = null,
        ?ClassificacaoEnum $classificacao = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->idiomaAudio = $idiomaAudio;
        $this->idiomaOriginal = $idiomaOriginal;
        $this->sinopse = $sinopse;
        $this->anoLancamento = $anoLancamento;
        $this->ultimaAtualizacao = new \DateTimeImmutable();
        $this->atores = new ArrayCollection();
        $this->classificacao = $classificacao;
    }

    public function addAtor(Ator $ator): void
    {
        if ($this->atores->contains($ator)) {
            return;
        }

        $this->atores->add($ator);
        $ator->addFilme($this);
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getIdiomaAudio(): Idioma
    {
        return $this->idiomaAudio;
    }

    public function getAtores(): array
    {
        return $this->atores->map(function (Ator $ator) {
            return $ator->getNome();
        })->toArray();
    }

    public function getClassificacao()
    {
        return $this->classificacao->getKey();
    }
}
