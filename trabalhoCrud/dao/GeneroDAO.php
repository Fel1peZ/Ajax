<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Genero.php");

class GeneroDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function listar()
    {
        $sql = "SELECT * FROM genero ORDER BY nome_genero";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        return $this->map($resultado);
    }

    private function map($resultado)
    {
        $generos = array();
        foreach ($resultado as $r) {
            $genero = new Genero();
            $genero->setId($r['id_genero']);
            $genero->setNome($r['nome_genero']);
            $genero->setDescricao($r['descricao']);

            array_push($generos, $genero);
        }

        return $generos;
    }
}