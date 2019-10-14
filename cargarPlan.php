
<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{
    $resultado = pg_query($con,"select nomb_docente from docente");
    while($dato =pg_fetch_array($resultado)){
        //echo "<p>$dato->nombre</p>";
        echo $dato[0];
    }
}
pg_close($con);
?>