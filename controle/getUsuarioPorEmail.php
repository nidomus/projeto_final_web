<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/UsuarioBD.php";

$udb = new UsuarioBD();
$usuario = $udb->buscarUsuarioPorEmail($_POST["email"]);

if($usuario==null){
    echo '{"erro":"1"}';
}else{
    echo '{"erro":"0", "usuario":{"id":'.$usuario->getId().',"nome":"'.$usuario->getName().'","email":"'.$usuario->getEmail().
        '","foto":"'.$usuario->getFoto().'"}}';
}
?>