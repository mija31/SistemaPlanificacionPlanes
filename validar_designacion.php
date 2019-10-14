<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{

	if(isset($_POST['enviar_desig'])){	
    //boton radio primero seleccionado para agregar una carrera----------------
        $docente =$_POST['select_desig_doc'];    
        $carreras =$_POST['lista_carreras'];
        $materias =$_POST['lista_materias'];
   
        //obtine la lista de lops codigos de las diferentes carreras
      for ($i=0;$i<count($carreras);$i++)    
       {   
          for($a=0; $a < count($materias); $a++){
              $sql_cod = "select cod_doc, cod_materia, cod_carr
                          from docente, carrera, materia
                        where nomb_doc = '$docente' and nomb_carr = '$carreras[$i]' and nomb_materia = '$materias[$a]';";
              $result = pg_query($con, $sql_cod) or die("error en obtener codigos");
              $fila = pg_fetch_array($result);
              $sql = "insert into designado(cod_doc, cod_materia, cod_carr)
              values ('$fila[0]','$fila[1]', $fila[2]);";
              pg_query($con,$sql) or die("error en la insercion");
      } 
    }
    echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
    }//isset
}
pg_close($con);
?>