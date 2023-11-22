<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/login/modelo/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/login/persistencia/UsuarioBD.php";

$ubd = new UsuarioBD();

for($i = 1;$i <=3; $i++){
    $u = new Usuario("Usuario".$i,"usuario$i@email.com","1234");
    $ubd->salvar($u);
}
?>