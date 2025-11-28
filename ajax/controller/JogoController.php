<?php

require_once(__DIR__ . "/../dao/JogoDAO.php");
require_once(__DIR__ . "/../model/Jogo.php");
require_once(__DIR__ . "/../service/JogoService.php");

class JogoController {

    private JogoDAO $jogoDAO;
    private JogoService $jogoService;

    public function __construct() {
        $this->jogoDAO = new JogoDAO(); 
        $this->jogoService = new JogoService();       
    }

    public function listar() {
        return $this->jogoDAO->listar();
    }  

    public function buscarPorId(int $id){
        return $this->jogoDAO->buscarPorId($id);
    }

    public function inserir(Jogo $jogo) {
        $erros = $this->jogoService->validarJogo($jogo);
        if(count($erros) > 0)
            return $erros;

        $erros = [];
        $erro = $this->jogoDAO->inserir($jogo);
        if($erro) {
            $erros[] = "Erro ao salvar o jogo!";
            if(AMB_DEV) $erros[] = $erro->getMessage();
        }
        return $erros;
    }

    public function alterar(Jogo $jogo){
        $erros = $this->jogoService->validarJogo($jogo);
        if(count($erros) > 0)
            return $erros;

        $erro = $this->jogoDAO->alterar($jogo);
        if($erro) {
            $erros[] = "Erro ao atualizar o jogo!";
            if(AMB_DEV) $erros[] = $erro->getMessage();
        }
        return $erros;
    }

    public function excluir($id){
        $erros = [];
        $erro = $this->jogoDAO->excluir($id);
        if($erro) {
            $erros[] = "Erro ao excluir o jogo!";
            if(AMB_DEV) $erros[] = $erro->getMessage();
        }
        return $erros;
    }


    public function validarTituloAjax() {
        header('Content-Type: application/json; charset=utf-8');
        $titulo = $_GET['titulo'] ?? '';
        $existe = $this->jogoDAO->tituloExiste($titulo); // corrigido
        echo json_encode(['existe' => $existe]);
    }

    public function excluirAjax() {
        header('Content-Type: application/json; charset=utf-8');
        $id = $_POST['id'] ?? 0;
        $erros = $this->excluir($id);
        if (!$erros) {
            echo json_encode(['ok' => true]);
        } else {
            echo json_encode(['ok' => false, 'erros' => $erros]);
        }
    }
}
