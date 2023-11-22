<?php
session_start();
if(isset($_SESSION['email'])){
    echo "autorizado";
}else{
    echo "não autorizado";
}
?>