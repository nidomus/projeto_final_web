<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/UsuarioBD.php";

$udb = new UsuarioBD();
$resposta = $udb->alterarProjetoSelecionado($_POST["usuario"],$_POST["projeto"]);

if($resposta){
    echo '{"erro":"0"}';

    $_SESSION["projeto_id"] = $_POST["projeto"];

}else{
    echo '{"erro":"1"}';

}
?>