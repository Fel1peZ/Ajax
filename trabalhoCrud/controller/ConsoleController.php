<?php

require_once(__DIR__ . "/../dao/ConsoleDAO.php");

class ConsoleController
{
    private ConsoleDAO $consoleDAO;

    public function __construct()
    {
        $this->consoleDAO = new ConsoleDAO();
    }

    public function listar()
    {
        return $this->consoleDAO->listar();
    }
}