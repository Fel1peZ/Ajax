<?php

require_once(__DIR__ . "/../../model/Jogo.php");
require_once(__DIR__ . "/../../controller/JogoController.php");

$msgErro = "";
$jogo = null;

//Receber os dados do formulário
if(isset($_POST['titulo'])) {
    //Usuário já clicou no gravar
    
    $titulo        = trim($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
    $idGenero       = is_numeric($_POST['genero']) ? $_POST['genero'] : NULL;
    $dataLancamento = trim($_POST['dataLancamento']) ? trim($_POST['dataLancamento']) : NULL;
    $idConsole     = is_numeric($_POST['console']) ? $_POST['console'] : NULL;
    $diretor = trim($_POST['diretor']) ? trim($_POST['diretor']) : NULL;
    $img = trim($_POST['img']) ? trim($_POST['img']) : NULL;

    //Criar um objeto Jogo para persistí-lo
    $jogo = new Jogo();
    $jogo->setId(0);
    $jogo->setTitulo($titulo);

    $genero = new Genero();
    $genero->setId($idGenero);
    $jogo->setGenero($genero); 

    $jogo->setDataLancamento($dataLancamento);
    
    $console = new Console();
    $console->setId($idConsole);
    $jogo->setConsole($console);

    $jogo->setDiretor($diretor);
    $jogo->setImg($img);

    //print_r($jogo);

    //Chamar o DAO para salvar o objeto jogo
    $jogoCont = new JogoController();
    $erros = $jogoCont->inserir($jogo);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");
?>