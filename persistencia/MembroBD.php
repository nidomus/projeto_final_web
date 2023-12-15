<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Projeto.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Membro.php";

class MembroBD
{
    private $pdo;

    public function __construct()
    {
        $host = "localhost";//getenv('MYSQL_HOST');
        $dbName = "projeto_final";//getenv('MYSQL_DATABASE');
        $user = "root";//getenv('MYSQL_USER');
        $pass = "";//getenv('MYSQL_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$dbName";
        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function salvar($id_projeto, $id_usuario, $cargo)
    {   

        $sql = "INSERT INTO membro(id_usuario,id_projeto,cargo) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([$id_projeto, $id_usuario, $cargo]);
        } catch (\Throwable $th) {
            return false;
        }
        return true;

    }

    public function deletar($id_projeto, $id_usuario)
    {   

        $sql = "DELETE FROM membro WHERE id_projeto = ? AND id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([$id_projeto, $id_usuario]);
        } catch (\Throwable $th) {

            return false;
        }
        return true;

    }
}