<?php 
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id']) && !isset($_SESSION['isAdmin'])){
    die('Você não pode acessar esta página pois não está logado. <p><a href="index.php">Voltar</a></p>');
}
?>