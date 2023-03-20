<?php
//include 'connection.php';
include './models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['acao'] === "logar") {

    $usuario = new Usuario($_POST['email'], $_POST['senha']);
    if($usuario->logar($conn)){
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $usuario->getId();
        $_SESSION['nome'] = $usuario->getNome();
        header("Location: listar.php");
    }
    else{
        $erro = 'Usuário não encontrado';
        if (isset($erro)) {
            echo '<div class="error-message">' . $erro . '</div>';
        }
    }
    

}
?>