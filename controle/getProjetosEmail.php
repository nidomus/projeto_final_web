<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/ProjetoBD.php";

$projetoDB = new ProjetoBD();
$projetos = $projetoDB->getProjetosPorEmail($_SESSION["email"]);

if($projetos==null){
    echo '{"erro":"1"}';
}else{
    echo '{"erro":"0", "projetos":'. $projetos.'}';


}
?>