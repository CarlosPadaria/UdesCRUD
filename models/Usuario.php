<?php 
include 'connection.php';
class Usuario{
    private $id;
    private  $nome;
    private  $email;
    private  $senha;
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

    

    public function logar(mysqli $conn){
        $email = $conn->real_escape_string($this->email);
        $senha = $conn->real_escape_string($this->senha);

        $sql = $conn->prepare("SELECT * FROM USUARIO WHERE email= ? AND senha= ?");
        $sql->bind_param("ss", $email, $senha);
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
}
?>