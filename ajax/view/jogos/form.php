<?php

require_once(__DIR__ . "/../../controller/ConsoleController.php");
require_once(__DIR__ . "/../../controller/GeneroController.php");

$consoleCont = new ConsoleController();
$consoles = $consoleCont->listar();

$generoCont = new GeneroController();
$generos = $generoCont->listar();
//print_r($Consoles);

include_once(__DIR__ . "/../include/header.php");
?>

<h3><?= $jogo && $jogo->getId() > 0 ? 'Alterar' : "Inserir" ?>
    jogo</h3>

<div class="row">

    <div class="col-6">

        <form method="POST" action="">

            <div>
                <label for="txtTitulo" class="form-label">Titulo:</label>
                <input type="text" id="txtTitulo" name="titulo" class="form-control"
                    placeholder="Informe o titulo"
                    value="<?= $jogo ? $jogo->getTitulo() : '' ?>">
            </div>

            <div>
                <label for="selGenero" class="form-label">Genero:</label>
                <select name="genero" id="selGenero" class="form-select">
                    <option value="">----Selecione----</option>

                    <?php foreach ($generos as $g): ?>
                        <option value="<?= $g->getId() ?>" <?= ($jogo && $jogo->getGenero()->getId() == $g->getId() ? 'selected' : '') ?>>
                            <?= $g ?><!-- Chama o toString da classe -->
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

             <div style="margin-bottom: 10px;">
                    <label for="dataLancamento">Data de Lançamento: </label>
                    <input type="date" name="dataLancamento" id="dataLancamento"
                        value="<?= $jogo ? $jogo->getDataLancamento() : '' ?>" />
            </div>

            <div>
                <label for="selConsole" class="form-label">Console:</label>
                <select name="console" id="selConsole" class="form-select">
                    <option value="">----Selecione----</option>

                    <?php foreach ($consoles as $c): ?>
                        <option value="<?= $c->getId() ?>" <?= ($jogo && $jogo->getConsole()->getId() == $c->getId() ? 'selected' : '') ?>>
                            <?= $c ?><!-- Chama o toString da classe -->
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="txtDiretor" class="form-label">Diretor:</label>
                <input type="text" id="txtDiretor" name="diretor" class="form-control"
                    placeholder="Informe o diretor"
                    value="<?= $jogo ? $jogo->getDiretor() : '' ?>">
            </div>

            <div>
                <label for="txtImg" class="form-label">Img:</label>
                <input type="text" id="txtImg" name="img" class="form-control"
                    placeholder="Informe o img"
                    value="<?= $jogo ? $jogo->getImg() : '' ?>">
            </div>

            <div>

                <input type="hidden" name="id"
                    value="<?= $jogo ? $jogo->getId() : 0 ?>">

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php  if($msgErro): ?>
        <div class="alert alert-danger">
            <?= $msgErro ?>
        </div>
         <?php  endif ?>
    </div>

</div>

<div class="mt-3">
    <a href="listar.php" class="btn btn-primary">Voltar</a>
</div>

<script src="js/jogos.js"></script>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>