<!DOCTYPE html>
<html lang="es">
<head>
<title>PLAN DE ESTUDIO</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/styleCrear.css" type="text/css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    <!--para la imagen-->
        <script src="js/fileinput.js"></script>
        <script src="js/fileinput_locale_es.js"></script>
        <link rel="stylesheet" href="css/fileinput.css" type="text/css">
    <!--Para los mensajes o atertas-->
     <link rel="stylesheet" href="css/messenger.css" type="text/css">
     <link rel="stylesheet" href="css/messenger-theme-air.css" type="text/css">
     <link rel="stylesheet" href="css/messenger-theme-future.css" type="text/css">
     <script src="js/messenger.min.js"></script>
</head>  
<body>  
  <div class="container">
      <?php
      $cod_carrera = $_GET['cod_materia'];
       require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            
            $consul = "select * from carrera where cod_carr = '$cod_carrera'";
            $res_carrera = pg_query($con,$consul);
            $datos_carr = pg_fetch_array($res_carrera);
            echo "<b>Plan de estudios:</b>".$datos_carr[2]."<br>";
                echo "<b>Tipo:</b>".$datos_carr[3]."<br>";
            echo "<b>Código:</b>".$datos_carr[0]."<br>";
            echo "<b>Gestión:</b>".date("Y")."<br><br>";
        echo "<div  class='table-condensed  table-responsive'>
             <table class='table table-bordered '>
            <thead>
                <tr>
                  <th>NIVEL</th>
                  <th>CÓDIGO</th>
                  <th>MATERIA</th>
                  <th>¿ELECTIVA?</th>
                  <th>SIGLA</th>
                </tr>
            </thead>
            <tbody>";
            $resul_mat = pg_query($con,"select *
                                        from materia
                                        where cod_materia in (
                                        select cod_materia
                                        from designado
                                        where cod_carr = '$cod_carrera'
                                        ) order by nivel;");
            while($fila_mat = pg_fetch_array($resul_mat)){
        echo "<tr>
                  <td>$fila_mat[4]</td>
                  <td>$fila_mat[0]</td>
                  <td>$fila_mat[3]</td>
                  <td>$fila_mat[5]</td>
                  <td>$fila_mat[6]</td>
              </tr>";
            }
    echo "</tbody>
    </table>
    </div>";
            }
        pg_close($con);
        ?> 
    </div>
</body>
</html>