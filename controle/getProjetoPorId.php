<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/ProjetoBD.php";

$projetoDB = new ProjetoBD();
$projeto = $projetoDB->getProjetoPorId($_POST["id"]);

if($projeto==null){
    echo '{"erro":"1"}';
}else{
    echo '{"erro":"0", "projeto":'. $projeto.'}';


}
?>