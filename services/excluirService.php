<?php
include 'connection.php';
include_once('./models/Usuario.php');

if (isset($_REQUEST["acao"]) && $_SERVER["REQUEST_METHOD"] == "GET") {

    if($_REQUEST["acao"] == 'excluir' && $_SESSION['isAdmin'] == 1){
        $usuarioDeletar = new Usuario('','');
        $usuarioDeletar->setId($_REQUEST['id']);
        $usuarioDeletar->excluir($conn);
        header("Location: listar.php");
    }
   
}
?>