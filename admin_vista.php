<!DOCTYPE html>

<html lang="es">
<head> 
</head>  
<body>     
    <div class="container"> 
        <!--panel de facultad para ser cargado el index_admin.php-->
        
      <div id="vista_facultad">
        
        <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select *
                                        from facultad;");
            while($dato = pg_fetch_array($resultado)){
        echo "<div id='facultades' class='panel panel-danger'>
            <div class='panel-heading'><p class='text-uppercase'>FAC. DE $dato[1]</p></div>
            <div class='panel-body'> 
            <label>CARRERAS</label>
            <div  class='table-condensed table-bordered table-responsive'>
             <table class='table table-bordered '>
            <thead>
                <tr>
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>TIPO</th>
                  <th>VERSIÓN</th>
                  <th>REGIÓN</th>
                </tr>
            </thead>
            <tbody>";
            $resultado_carr = pg_query($con,"select *
                                            from carrera
                                            where cod_facu =  $dato[0];");
            while($dato_carr = pg_fetch_array($resultado_carr)){
                        $cod_href = $dato_carr[0];
        echo "<tr>
                  <td><a href='visor_plan.php?cod_materia=$cod_href' target='_Blank'><u>$cod_href</u></a></td>
                  <td>$dato_carr[2]</td>
                  <td>$dato_carr[3]</td>
                  <td>$dato_carr[4]</td>
                  <td>$dato_carr[5]</td>
              </tr>";
            }
     
    echo "</tbody>
    </table>
    </div>
        </div>
        </div>";
            }
        }
        pg_close($con);
        ?> 
       </div>
        <div id="vista_designacion">
        <div id='designaciones' class='panel panel-danger'>
            <div class='panel-heading'>DESIGNACIONES DE DOCENTES</div>
            <div class='panel-body'> 
            <div  class='table-condensed table-bordered table-responsive'>
             <table class='table table-bordered '>
            <thead>
                <tr>
                  <th>CÓDIGO DOCENTE</th>
                  <th>NOMBRE DOCENTE</th>
                  <th>NOMBRE CARRERA</th>
                  <th>NOMBRE MATERIA</th>
                    
                </tr>
            </thead>
            <tbody>
        <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con)
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $sql = "select DE.cod_doc, DOC.nomb_doc, DOC.apellido_pat, DOC.apellido_mat, CA.nomb_carr, MA.nomb_materia 
                    from  designado DE, docente DOC, materia MA, carrera CA
                    where DE.cod_doc = DOC.cod_doc and DE.cod_materia = MA.cod_materia and DE.cod_carr = CA.cod_carr;";
            $resultado = pg_query($con,$sql) or die("error de obtener designaciones");
            while($dato = pg_fetch_array($resultado)){
            echo "<tr>
                  <td>$dato[0]</td>
                  <td>$dato[1]$dato[2]$dato[3]</td>
                  <td>$dato[4]</td>
                  <td>$dato[5]</td>
                  <td><button type='button' id='btn_mas' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove' ></span></button></td>
              </tr>";
              }
            }
         pg_close($con);
        ?> 
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div> 
</div>
</body>  
</html>