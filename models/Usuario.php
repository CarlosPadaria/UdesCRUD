<?php 
include 'connection.php';
class Usuario{
    private $id;
    private  $nome;
    private  $email;
    private  $senha;
    private $isAdmin;
    public function __construct($email, $senha){
        $this->email = $email;
        $this->senha = $senha;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getId(){
        return $this->id;
    }

    public function setIsAdmin($isAdmin){
        $this->isAdmin = $isAdmin;
    }

    public function getIsAdmin(){
        return $this->isAdmin;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function logar(mysqli $conn){
        $email = $conn->real_escape_string($this->email);
        $senha = $conn->real_escape_string($this->senha);
        $isAdmin = 1;

        $sql = $conn->prepare("SELECT * FROM USUARIO WHERE email= ? AND senha= ? AND isAdmin= ?");
        $sql->bind_param("ssi", $email, $senha, $isAdmin);
        $sql->execute();

        $resultadoBusca = $sql->get_result();
        $quantidade = $resultadoBusca->num_rows;

        $usuarioDaBusca = $resultadoBusca->fetch_object();
        if($quantidade > 0){
            $this->id = $usuarioDaBusca->id;
            $this->nome = $usuarioDaBusca->nome;
            return true;
        }
        return false;
    }

    public function listar(mysqli $conn){
        $isAdmin = 0;
        $usuarios = array();

        $sql = $conn->prepare("SELECT * FROM USUARIO WHERE isAdmin = ?");
        $sql->bind_param("i", $isAdmin);
        $sql->execute();
        $resultadoBusca = $sql->get_result();
        
        while($row = $resultadoBusca->fetch_assoc()){
            $usuarios[] = $row;
        }

        return $usuarios;   
    }

    public function getUsuario(mysqli $conn){
        $id = $conn->real_escape_string($this->id);
        $usuario = array();

        $sql = $conn->prepare("SELECT * FROM USUARIO WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $resultadoBusca = $sql->get_result();
        while($row = $resultadoBusca->fetch_assoc()){
            $usuario[] = $row;
        }

        return $usuario; 
        
    }

    public function cadastrar(mysqli $conn){
        $nome = $conn->real_escape_string($this->nome);
        $email = $conn->real_escape_string($this->email);
        $senha = $conn->real_escape_string($this->senha);
        $isAdmin = 0;

        $sql = $conn->prepare("INSERT INTO USUARIO(nome, email, senha, isAdmin) VALUES(?, ?, ?, ?)");
        $sql->bind_param("sssi", $nome, $email, $senha, $isAdmin);
        
        if($sql->execute()){
            return true;
        }

        return false;

        
    }
    public function excluir(mysqli $mysqli){
        $id = $this->getId();
        $isAdmin = 0;

        $sqlExcluir = $mysqli->prepare("DELETE FROM USUARIO WHERE id= ? AND isAdmin = ?");
        $sqlExcluir->bind_param("ii", $id, $isAdmin);

        if($sqlExcluir->execute()){
            return true;
        }
        return false;
    }

    public function editar(mysqli $conn){
        $nome = $conn->real_escape_string($this->nome);
        $email = $conn->real_escape_string($this->email);
        $senha = $conn->real_escape_string($this->senha);
        $id = $conn->real_escape_string($this->id);
        $isAdmin = 0;

        $sql = $conn->prepare("UPDATE USUARIO SET nome = ?, email = ?, senha = ? WHERE id = ? AND isAdmin = ?");
        $sql->bind_param("sssii", $nome, $email, $senha, $id, $isAdmin);
        if($sql->execute()){
            return true;
        }
        return false;

    }
}
?>