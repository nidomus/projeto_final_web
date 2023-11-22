<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/login/persistencia/UsuarioBD.php";

$udb = new UsuarioBD();
$usuario = $udb->autenticar($_POST["email"],$_POST["senha"]);
if($usuario==null){
    echo '{"erro":"1"}';
}else{
    echo '{"erro":"0", "usuario":{"nome":"'.$usuario->getName().'","email":"'.$usuario->getEmail().'"}}';
    $_SESSION["email"] = $usuario->getEmail();
}
?>