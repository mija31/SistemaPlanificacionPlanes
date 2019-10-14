<?php
session_start();
if(isset($_SESSION["usuario"])){
    echo"hola administrador";
    
}else{
    echo '<meta http-equiv="REFRESH" content="0;url=./index.php">';
}
?>
