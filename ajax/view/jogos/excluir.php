<?php
    require_once(__DIR__ . "/../../model/Jogo.php");
    require_once(__DIR__ . "/../../controller/JogoController.php");

    $msgErro = "";
    $jogo = null;

//Recber o id do jogo get
if(isset($_GET['id']))
    $id =$_GET['id'];

//Chamar o controler para excluir

$jogoCont = new JogoController;
$jogoCont->buscarPorId($id);



$erros = $jogoCont->excluir($id);




 //Verifica se deu erro
    // Se deu erro exibe o erro na prorpia pagina
     if(! $erros){
            header("location: listar.php");
            exit;
        } else{

            $msgErro = implode("<br>",$erros);
        }
/*else{
    echo "Jogo não encontrado! <br>";
    echo "<a href='listar.php'>Voltar</a>";

}*/

    //Se nao deu erro sucesso volta pro listar