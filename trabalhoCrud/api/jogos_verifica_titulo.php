<?php

require_once(__DIR__ . "/../controller/JogoController.php");
require_once(__DIR__ . "/../model/Jogo.php");

$titulo = trim($_POST['titulo'] ?? '');

$jogosCont = new JogoController();
$lista = $jogosCont->listar();
$erros = [];

foreach ($lista as $jogos) {

    if (strcasecmp($titulo, trim($jogos->getTitulo())) === 0) {
        $erros[] = "Título já existe";
        break;
    }
}

$msgErro = "";
if (!empty($erros)) {
    $msgErro = implode("<br>", $erros);
}

echo $msgErro;
