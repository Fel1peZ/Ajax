<?php
require_once(__DIR__ . "/../../controller/JogoController.php");

//Chamar o controller para obter a lista de jogos
$jogosCont = new JogoController();
$lista = $jogosCont->listar();

//print_r($lista);


//Incluir o header
include_once(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Jogos</h3>

<div class="mb-3">
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
</div>

<table class="table table-striped table-primary">
    <!-- Cabeçalho -->
    <div class="bg-primary">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Data de lançamento</th>
            <th>Console</th>
            <th>Diretor</th>
            <th>Img</th>
        </tr>

        <!-- Dados -->
        <?php foreach ($lista as $jogos): ?>
            <tr>
                <td><?= $jogos->getId() ?></td>
                <td><?= $jogos->getTitulo() ?></td>
                <td><?= $jogos->getGenero() ?></td>
                <td><?= $jogos->getDataLancamento() ?></td>
                <td><?= $jogos->getConsole() ?></td>
                <td><?= $jogos->getDiretor() ?></td>
                <td> <img src="<?= $jogos->getImg() ?>" alt="Capa do jogo"
                        class="img-fluid"
                        style="max-width: 80px; height: auto;">
                </td>
                <td>
                    <a href="alterar.php?id=<?= $jogos->getId() ?>">
                        <img src="../../img/btn_editar.png" alt="">
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $jogos->getId() ?>" onclick="confirm('Confirma a exclusão')">
                        <img src="../../img/btn_excluir.png" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </div>


</table>

<?php
//Incluir o footer
include_once(__DIR__ . "/../include/footer.php");
?>