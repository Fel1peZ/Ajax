<?php

class Console {

    private ?int $id;
    private ?string $nome;
    private ?string $fabricante;
    private ?string $lancamento;
    private ?string $geracao;
    private ?string $preco_lancamento;


     public function __toString() {
        return $this->nome 
              ;
    }
 

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
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of fabricante
     */
    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    /**
     * Set the value of fabricante
     */
    public function setFabricante(?string $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get the value of lancamento
     */
    public function getLancamento(): ?string
    {
        return $this->lancamento;
    }

    /**
     * Set the value of lancamento
     */
    public function setLancamento(?string $lancamento): self
    {
        $this->lancamento = $lancamento;

        return $this;
    }

    /**
     * Get the value of geracao
     */
    public function getGeracao(): ?string
    {
        return $this->geracao;
    }

    /**
     * Set the value of geracao
     */
    public function setGeracao(?string $geracao): self
    {
        $this->geracao = $geracao;

        return $this;
    }

    /**
     * Get the value of preco_lancamento
     */
    public function getPrecoLancamento(): ?string
    {
        return $this->preco_lancamento;
    }

    /**
     * Set the value of preco_lancamento
     */
    public function setPrecoLancamento(?string $preco_lancamento): self
    {
        $this->preco_lancamento = $preco_lancamento;

        return $this;
    }
}