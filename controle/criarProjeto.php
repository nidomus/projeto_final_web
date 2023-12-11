<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/ProjetoBD.php";


$projeto = new Projeto();
$projeto->nome = $_POST['nome'];
$projeto->resumo= $_POST['resumo'];


$projetoBD = new ProjetoBD();

$resultado = $projetoBD->salvar($projeto, $_SESSION['user_id']);

if($resultado){
    echo '{"erro":"0"}';
}
else{
    echo '{"erro":"1"}';
}

?>

