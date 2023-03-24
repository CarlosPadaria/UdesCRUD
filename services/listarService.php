<?php 
    include_once('./models/Usuario.php');

    $usuario = new Usuario("","");

    $arrayListar = $usuario->listar($conn);
    if(count($arrayListar) > 0){
        echo '<table class="table responsivo">'; 
        echo '<thead>';
        echo '<tr>';
        echo '<th data-label="Id">Id</th>';
        echo '<th data-label="Nome">Nome</th>';
        echo '<th data-label="Email">Email</th>';
        echo '<th data-label="Senha">Senha</th>';
        echo '<th data-label="Editar">Editar</th>';
        echo '<th data-label="Deletar">Deletar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
       foreach($arrayListar as $value){
            echo '<tr>';
            echo '<td data-label="Id">'. $value['id'] . '</td>';
            echo '<td data-label="Nome">'. $value['nome'] . '</td>';
            echo '<td data-label="Email">'. $value['email'] . '</td>';
            echo '<td data-label="Senha">'. $value['senha'] . '</td>';
            print "<td><button class='btn btn-success' onclick=\"location.href='editar.php?id=".$value['id']."';\">Editar</button></td>";
            print "<td><button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='listar.php?acao=excluir&id=".$value['id']."';}else{false;}\">Excluir</button></td>";
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    else{
        echo "<h1 class='userNotFoundText'>Nenhum usuário encontrado :/</h1>";
    }
    
?>