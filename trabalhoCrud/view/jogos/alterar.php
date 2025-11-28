<?php

    require_once(__DIR__ . "/../../model/Jogo.php");
    require_once(__DIR__ . "/../../controller/JogoController.php");


    $msgErro = "";
    $jogo = null;

    if(isset($_POST['titulo'])) {
    //Usuário já clicou no gravar
        $id          = $_POST['id'];
        $titulo        = trim($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
        $idGenero       = is_numeric($_POST['genero']) ? $_POST['genero'] : NULL;
        $dataLancamento = trim($_POST['dataLancamento']) ? trim($_POST['dataLancamento']) : NULL;
        $idConsole     = is_numeric($_POST['console']) ? $_POST['console'] : NULL;
        $diretor = trim($_POST['diretor']) ? trim($_POST['diretor']) : NULL;
        $img = trim($_POST['img']) ? trim($_POST['img']) : NULL;

        //Criar um objeto Jogo para persistí-lo
        $jogo = new Jogo();
        $jogo->setId($id);
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

        //chamar o controller
        $jogoCont = new JogoController();
        $erros = $jogoCont->alterar($jogo);

        if(! $erros){
            header("location: listar.php");
        } else{

            $msgErro = implode("<br>",$erros);
        }


        //$jogoCont->atualizarRegistro($jogo);
    }else{

    

    $id = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

    $jogoCont = new JogoController;
    $jogo = $jogoCont->buscarPorId($id);

    if(! $jogo){
        echo"Id do jogo é inválido<br>";
        echo"<a href='listar.php'>Voltar</a>";
        exit;
    }
    }

    include_once(__DIR__ . "/form.php");