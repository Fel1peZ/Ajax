<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Console.php");

class ConsoleDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function listar()
    {
        $sql = "SELECT * FROM console ORDER BY nome_console";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        return $this->map($resultado);
    }

    private function map($resultado)
    {
        $consoles = array();
        foreach ($resultado as $r) {
            $console = new Console();
            $console->setId($r['id_console']);
            $console->setNome($r['nome_console']);
            $console->setFabricante($r['fabricante']);
            $console->setLancamento($r['ano_lancamento'] );
            $console->setGeracao($r['geracao']);
            $console->setPrecoLancamento($r['preco_lancamento']);

            array_push($consoles, $console);
        }

        return $consoles;
    }
}