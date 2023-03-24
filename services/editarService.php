<?php
include 'connection.php';
include_once('./models/Usuario.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $usuario = new Usuario("","");
        $usuario->setId($_REQUEST['id']);
        $dadosUsuario = $usuario->getUsuario($conn);
        $nome = "";
        $email = "";
        $senha = "";

        foreach($dadosUsuario as $value){
            $nome = $value['nome'];
            $email = $value['email'];
            $senha = $value['senha'];
        }
   
}
else if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['isAdmin'] == 1){
    if(strlen($_POST['email']) > 0 && strlen($_POST['nome']) > 0 && strlen($_POST['senha']) > 0){
    $usuario = new Usuario($_POST['email'], $_POST['senha']);
    $usuario->setNome($_POST['nome']);
    $usuario->setId($_POST['id']);

    $usuario->editar($conn);

    header("Location: listar.php");

    }
    else{
        $erro = 'Por favor preencha todos os campos!';
        if(isset($erro)){
            echo '<div class="error-message">' . $erro . '</div>';
        }
        $usuario = new Usuario("","");
        $usuario->setId($_REQUEST['id']);
        $dadosUsuario = $usuario->getUsuario($conn);
        $nome = "";
        $email = "";
        $senha = "";

        foreach($dadosUsuario as $value){
            $nome = $value['nome'];
            $email = $value['email'];
            $senha = $value['senha'];
        }
    }
    
}
?>