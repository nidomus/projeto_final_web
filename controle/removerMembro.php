<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/MembroBD.php";



$membroBD = new MembroBD();

$resultado = $membroBD->deletar($_POST['id_projeto'],$_POST['id_usuario']);

if($resultado){
    echo '{"erro":"0"}';
}
else{
    echo '{"erro":"1"}';
}

?>

