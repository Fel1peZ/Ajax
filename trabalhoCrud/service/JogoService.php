<?php

require_once(__DIR__ . "/../model/Jogo.php");

class JogoService
{
    public function validarJogo(Jogo $jogo)
    {
        $erros = array();

        if (!$jogo->getTitulo()) {
            array_push($erros, "Informe o título do jogo");
        }

        if (!$jogo->getGenero()->getId()) {
            array_push($erros, "Informe o gênero do jogo");
        }

        if (!$jogo->getConsole()->getId()) {
            array_push($erros, "Informe o console do jogo");
        }

        if (!$jogo->getDataLancamento()) {
            array_push($erros, "Informe a data de lançamento");
        }

        if (!$jogo->getDiretor()) {
            array_push($erros, "Informe o diretor do jogo");
        }

        if (!$jogo->getImg()) {
            array_push($erros, "Informe a imagem do jogo");
        }

        return $erros;
    }
}