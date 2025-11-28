<?php 

require_once(__DIR__. "/../controller/JogoController.php");
require_once(__DIR__ . "/../model/Jogo.php");

$titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : null;
$idGenero = is_numeric($_POST['idGenero']) ? $_POST['idGenero'] : null;
$data = trim($_POST['data']) ? trim($_POST['data']) : null;
$idConsole = is_numeric($_POST['idConsole']) ? $_POST['idConsole'] : null;
$diretor = trim($_POST['diretor']) ? trim($_POST['diretor']) : null;
$img = trim($_POST['img']) ? trim($_POST['img']) : null;


$jogo = new Jogo();
$jogo->setTitulo($titulo);
$jogo->setGenero(new Genero($idGenero));
$jogo->setConsole(new Console($idConsole));
$jogo->setDiretor($diretor);
$jogo->setImg($img);
$jogo->setDataLancamento($data);

//print_r($jogo);


$jogosCont = new JogoController();
$erros = $jogosCont->inserir($jogo);

$msgErro ="";
if($erros)
        $msgErro = implode("<br>", $erros);

echo $msgErro;
//print_r($erros);

