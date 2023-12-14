<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/UsuarioBD.php";

$udb = new UsuarioBD();
$resposta = $udb->verificar_email($_POST["email"]);

if($resposta != null){

    echo '{"existe":"1"}';

}else{

    echo '{"existe":"0"}';
}
?>