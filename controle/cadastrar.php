<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_final_web/persistencia/UsuarioBD.php";

$foto_dividida = explode(".",$_POST['foto']);

$extensao_foto = end($foto_dividida);

$randomString = md5(uniqid(rand(), true));
$randomString = substr($randomString, 0, 15);

$nome_foto = $randomString . '.' . $extensao_foto;


if($_POST['foto'] !== 'null'){

    $photo_path = "fotos_usuarios/". $nome_foto;

}else{
    $photo_path = "fotos_usuarios/user_default.jpg" ;
    $nome_foto = null;
}

$user = new Usuario(null,$_POST['nome'],$_POST['email'],$_POST['senha'], $photo_path);

$udb = new UsuarioBD();

$udb->salvar($user);


echo $nome_foto;

?>

