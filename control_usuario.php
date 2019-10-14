<?php
session_start(); 
if(isset($_SESSION["usuario"]) && isset($_SESSION["password"])){
    echo '<meta content="1;url=./index_admin.php">';
    
    }else{
            echo '<meta http-equiv="REFRESH" content="0;url=./index.php">';
            
            
            }
?>