<?php
require_once(__DIR__. "/../controller/JogoController.php");
require_once(__DIR__ . "/../model/Jogo.php");

$idJogo = is_numeric($_POST['id']) ? $_POST['id'] : null;
$jogoCont = new JogoController;
$jogoCont->buscarPorId($idJogo);
$erros = $jogoCont->excluir($idJogo);

$msgErro ="";
if($erros)
        $msgErro = implode("<br>", $erros);

echo $msgErro;