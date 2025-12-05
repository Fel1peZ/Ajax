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
        $lista = $this->jogoDAO->listar();
        return $lista;
    }  

     public function buscarPorId(int $id){
        
        $jogo = $this->jogoDAO->buscarPorId($id);
        return $jogo;


    }
    
    public function salvar(Jogo $jogo) {
        $erros = $this->jogoService->validarJogo($jogo);

        if(! empty($erros))
            return $erros;
        
        $erroBanco = $this->jogoDAO->inserir($jogo); 
        if($erroBanco)
            return array($erroBanco);

        //Se tudo deu certo, retorna um array vazio
        return array();
    }


    public function inserir(Jogo $jogo) {
        $erros = $this->jogoService->validarJogo($jogo);
        if(count($erros) > 0)
            return $erros;

        //Se nao tiver erros, chama o DAO
        $erros = array();
        $erro = $this->jogoDAO->inserir($jogo);
        if($erro) {
            array_push($erros, "Erro ao salvar o jogo!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

    public function alterar(Jogo $jogo){
        $erros = $this->jogoService->validarJogo($jogo);
        if(count($erros) > 0)
            return $erros;

        //se nao deu erro, alterar o jogo no banco de dadoss
        $erro =$this->jogoDAO->alterar($jogo);

        if($erro) {
            array_push($erros, "Erro ao atualizar o jogo!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;

    }

    public function excluir($id){
        $erro = $this->jogoDAO->excluir($id);

        $erros = array();
        if($erro) {
            array_push($erros, "Erro ao excluir o jogo!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;

    }
    
   

}