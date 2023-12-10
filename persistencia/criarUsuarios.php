<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/modelo/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/UsuarioBD.php";

$ubd = new UsuarioBD();

for($i = 1;$i <=3; $i++){
    $u = new Usuario("Usuario".$i,"usuario$i@email.com","1234");
    $ubd->salvar($u);
}
?>