<?php

require_once(__DIR__ . "/Console.php");
require_once(__DIR__ . "/Genero.php");

class Jogo {

    private ?int $id;
    private ?string $titulo;
    private ?Genero $genero;
    private ?string $data_lancamento;
    private ?Console $console;
    private ?string $diretor;
    private ?string $img;

   

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of data_lancamento
     */
    public function getDataLancamento(): ?string
    {
        return $this->data_lancamento;
    }

    /**
     * Set the value of data_lancamento
     */
    public function setDataLancamento(?string $data_lancamento): self
    {
        $this->data_lancamento = $data_lancamento;

        return $this;
    }

    /**
     * Get the value of console
     */
    public function getConsole(): ?Console
    {
        return $this->console;
    }

    /**
     * Set the value of console
     */
    public function setConsole(?Console $console): self
    {
        $this->console = $console;

        return $this;
    }

    /**
     * Get the value of diretor
     */
    public function getDiretor(): ?string
    {
        return $this->diretor;
    }

    /**
     * Set the value of diretor
     */
    public function setDiretor(?string $diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * Set the value of img
     */
    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }
}