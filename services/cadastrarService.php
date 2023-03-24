<?php
//include 'connection.php';
include './models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['acao'] === "cadastrar") {
    if (
        strlen($_POST['email']) > 0 && strlen($_POST['nome']) > 0 && strlen($_POST['senha']) > 0
    ) {
        $usuario = new Usuario($_POST['email'], $_POST['senha']);
        $usuario->setNome($_POST['nome']);
        if ($usuario->cadastrar($conn)) {
        } else {
            $erro = 'Falha ao cadastrar';
            if (isset($erro)) {
                echo '<div class="error-message">' . $erro . '</div>';
            }
        }
    }
    else{
        $erro = 'Por favor preencha todos os dados!';
        if(isset($erro)){
            echo '<div class="error-message">' . $erro . '</div>';
        }
    }
}
