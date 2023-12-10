<?php

/* Get the name of the uploaded file */

$nome_arquivo = $_POST['nome'];



/* Choose where to save the uploaded file */
$location = "./../assets/imagens/usuarios/".$nome_arquivo;

echo $location;

$location = str_replace(['/r','/n'],'',$location);

echo $location;

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}
?>