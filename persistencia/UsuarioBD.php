<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/login/modelo/Usuario.php";
class UsuarioBD
{
    private $pdo;

    public function __construct()
    {
        $host = "localhost";//getenv('MYSQL_HOST');
        $dbName = "login";//getenv('MYSQL_DATABASE');
        $user = "root";//getenv('MYSQL_USER');
        $pass = "";//getenv('MYSQL_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$dbName";
        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function salvar(Usuario $usuario)
    {
        $sql = "INSERT INTO Usuarios (nome, email, password) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario->getName(), $usuario->getEmail(), $usuario->getPassword()]);
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM Usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function alterarSenha(Usuario $usuario)
    {
        $sql = "UPDATE Usuarios SET password = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario->getPassword(), $usuario->getId()]);
    }

    public function autenticar(string $usuario, string $senha)
    {
        $senha = md5($senha);
        $sql = "SELECT * FROM Usuarios WHERE email = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario, $senha]);
        $user = $stmt->fetch();
        if ($user) {
            $usuario = new Usuario($user["nome"],$user["email"],$user["password"]);
            return $usuario;
        } 
        return null;
    }
}

?>