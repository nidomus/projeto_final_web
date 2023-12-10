<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Projeto.php";
class projetoBD
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

    public function getProjetosPorEmail(string $email)
    {   

        $sql = "SELECT projeto.id, projeto.nome, membro.cargo FROM membro
        inner join projeto on projeto.id = membro.id_projeto
        where membro.id_usuario = (select id from usuario where email = ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $projetos = $stmt->fetchAll(PDO::FETCH_CLASS, $class="projeto");
        

        if($projetos){
            return json_encode($projetos);
        }

        return null;
    }
}