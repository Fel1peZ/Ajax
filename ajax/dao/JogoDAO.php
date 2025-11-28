<?php

use Dom\Element;


require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Jogo.php");
require_once(__DIR__ . "/../model/Genero.php");
require_once(__DIR__ . "/../model/Console.php");

class JogoDAO
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function listar()
    {
        $sql = "SELECT j.*, 
                       g.nome_genero AS nome_genero, 
                       c.nome_console AS nome_console
                FROM listajogos j
                JOIN genero g ON g.id_genero = j.id_genero
                JOIN console c ON c.id_console = j.id_console";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        

        return $this->map($result);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT j.*, 
                       g.nome_genero AS nome_genero, 
                       c.nome_console AS nome_console
                FROM listajogos j
                JOIN genero g ON g.id_genero = j.id_genero
                JOIN console c ON c.id_console = j.id_console
                WHERE j.id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $jogos = $this->map($result);

        if (count($jogos) > 0) {
            return $jogos[0];
        } else {
            return NULL;
        }
    }

    public function inserir(Jogo $jogo)
    {
        try {
            $sql = "INSERT INTO listajogos (titulo, id_genero, data_lancamento, id_console, diretor, img)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $jogo->getTitulo(),
                $jogo->getGenero()->getId(),
                $jogo->getDataLancamento(),
                $jogo->getConsole()->getId(),
                $jogo->getDiretor(),
                $jogo->getImg()
            ]);
            return NULL;
        } catch (PDOException $e) {
            return $e;
        }
    }

    private function map(array $result)
    {
        $jogos = array();
        foreach ($result as $r) {
            $jogo = new Jogo();
            $jogo->setId($r["id"]);
            $jogo->setTitulo($r["titulo"]);
            $jogo->setDataLancamento($r["data_lancamento"]);
            $jogo->setDiretor($r["diretor"]);
            $jogo->setImg($r["img"]);

            $genero = new Genero();
            $genero->setId($r["id_genero"]);
            $genero->setNome($r["nome_genero"]);
            $jogo->setGenero($genero);

            $console = new Console();
            $console->setId($r["id_console"]);
            $console->setNome($r["nome_console"]);
            $jogo->setConsole($console);

            array_push($jogos, $jogo);
        }
        return $jogos;
    }

    public function alterar(Jogo $jogo)
    {
        try {
            $sql = "UPDATE listajogos
                    SET titulo = ?, id_genero = ?, data_lancamento = ?, id_console = ?, diretor = ?, img = ? 
                    WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $jogo->getTitulo(),
                $jogo->getGenero()->getId(),
                $jogo->getDataLancamento(),
                $jogo->getConsole()->getId(),
                $jogo->getDiretor(),
                $jogo->getImg(),
                $jogo->getId()
            ]);
            return NULL;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM listajogos WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([$id]);
            return NULL;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function tituloExiste(string $titulo): bool {
    try {
        $sql = "SELECT COUNT(*) AS total FROM jogos WHERE titulo = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$titulo]);
        $row = $stmt->fetch();
        return $row['total'] > 0;
    } catch (Exception $e) {
        if (defined('AMB_DEV') && AMB_DEV) {
            echo "Erro no tituloExiste: " . $e->getMessage();
        }
        return false;
    }
}
}