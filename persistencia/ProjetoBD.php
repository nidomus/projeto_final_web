<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Projeto.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Membro.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/Conexao.php";

class projetoBD
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }

    public function getProjetosPorEmail(string $email)
    {   

        $sql = "SELECT projeto.id, projeto.nome, membro.cargo FROM membro
        inner join projeto on projeto.id = membro.id_projeto
        where membro.id_usuario = (select id from usuario where email = ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $projetos = $stmt->fetchAll(PDO::FETCH_CLASS, $class="Projeto");
        

        if($projetos){
            return json_encode($projetos);
        }

        return null;
    }

    public function getProjetoPorId(string $id){

        $sql = "SELECT * FROM projeto
        where id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $proj = $stmt->fetch();


        $sql = "SELECT u.id,u.nome,u.foto,u.email,membro.cargo FROM membro
        inner join usuario u on u.id = membro.id_usuario
        where membro.id_projeto = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $membros = $stmt->fetchAll(PDO::FETCH_CLASS, $class="Membro", ['id','nome',null,'email','foto']);

        if($proj){
            
            $projeto = new Projeto();
            $projeto->id = $proj['id'];
            $projeto->nome = $proj['nome'];
            $projeto->resumo = $proj['resumo'];
            $projeto->membros = $membros;
            
            return $projeto;
        }
        return null;
    }


    public function salvar(Projeto $projeto, $id)
    {   

        $sql = "CALL criar_projeto (?, ?, ?, @var_id_projeto)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$id, $projeto->getNome(), $projeto->getResumo()]);
        return $stmt->fetch()['var_id_projeto'];


    }
}