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
}
?>