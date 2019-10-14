<?php
class Conexion{
 function conectar(){
      $string = "host='localhost' port='5432' user='postgres'  dbname='tis' password='postgres'";
      $connect = pg_connect($string) or die ('Error de conexion');
     return $connect;
 }

}
?>