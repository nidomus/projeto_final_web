<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Projeto.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Membro.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/Conexao.php";

class MembroBD
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
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