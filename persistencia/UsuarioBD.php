<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/Conexao.php";

class UsuarioBD
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }
    public function salvar(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario (nome, email, password, foto) VALUES (?, ?, ?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario->getName(), $usuario->getEmail(), 
        $usuario->getPassword(), $usuario -> getFoto()]);
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM usuario WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function alterarSenha(Usuario $usuario)
    {
        $sql = "UPDATE usuario SET password = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario->getPassword(), $usuario->getId()]);
    }

    public function alterarFoto(Usuario $usuario)
    {
        $sql = "UPDATE usuario SET password = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario->getPassword(), $usuario->getId()]);
    }

    public function autenticar(string $usuario, string $senha)
    {
        $senha = md5($senha);
        $sql = "SELECT * FROM usuario WHERE email = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario, $senha]);
        $user = $stmt->fetch();

        if ($user) {
            $usuario = new Usuario($user['id'],$user["nome"],$user["email"],$user["password"],$user["foto"]);

            $usuario->setProjetoSelecionado($user['projeto_selecionado']);

            return $usuario;
        } 
        return null;
    }

    public function buscarUsuarioPorEmail(string $email)
    {
        
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $usuario = new Usuario($user['id'],$user["nome"],$user["email"],$user["password"],$user["foto"]);
            return $usuario;
        } 
        return null;
    }

    public function alterarProjetoSelecionado($usuario,$projeto)
    {
        
        $sql = "UPDATE usuario SET projeto_selecionado = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$projeto,$usuario]);

        try {
            $stmt->execute([$projeto, $usuario]);
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }

    public function verificar_email(string $email)
    {

        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user;
    }
}

?>