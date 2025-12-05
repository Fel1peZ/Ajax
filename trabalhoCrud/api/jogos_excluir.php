<?php
require_once(__DIR__. "/../controller/JogoController.php");
require_once(__DIR__ . "/../model/Jogo.php");

$idJogo = is_numeric($_POST['id']) ? $_POST['id'] : null;
$jogoCont = new JogoController;
$jogoCont->buscarPorId($id);
$erros = $jogoCont->excluir($id);

$msgErro ="";
if($erros)
        $msgErro = implode("<br>", $erros);

echo $msgErro;