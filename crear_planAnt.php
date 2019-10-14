<?php
session_start();
$nomUsuario=$_SESSION["usuario"];

?>
<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{
            

	if(isset($_POST['guardar_ant'])){	
    
	$justi=$_POST['justificacion'];
	$propo=$_POST['proposito'];
	$obje=$_POST['objetivos'];
        
        $id_doc = "";
            $id_usuario = pg_query($con,"SELECT cod_doc FROM docente d WHERE d.nomb_doc = '$nomUsuario';")or die("Error en la Consulta SQL");
            while($aux = pg_fetch_array($id_usuario)){
            $id_doc= $aux[0];
            }
        $id_mat = "";
          $id_materia = pg_query($con,"SELECT cod_materia FROM designado  WHERE designado.cod_doc = '$id_doc';")or die("Error en la Consulta SQL");
          while($mat = pg_fetch_array($id_materia)){
            $id_mat= $mat[0];
            }
	  
            
             pg_query($con, "INSERT INTO plan_antiguo (justificacion_gral, proposito_gral, objetivo_gral )
			VALUES ('$justi','$propo','$obje');") or die("Error en la Consulta SQL");
          $codMat = "";
          $idMat = pg_query($con,"SELECT cod_materia FROM materia  WHERE materia.cod_materia = '$id_mat';")or die("Error en la Consulta SQL");
          while($m = pg_fetch_array($idMat)){
            $codMat= $mat[0];
            }
             
            $id_plan_ant = "";
             $id_ant= pg_query($con,"SELECT MAX(id_plan_antiguo) AS id_plan_antiguo FROM plan_antiguo;");
                     if ($row = pg_fetch_row($id_ant)) 
                    {
                            $id_plan_ant = trim($row[0]);
                       }
             
               $nombre_url=$_POST['seleccionado'];
               
             pg_query($con,"UPDATE materia SET id_plan_antiguo='$id_plan_ant' WHERE nomb_materia='$nombre_url';")or die("Error en la Consulta SQL");
             
	
        //echo "no se  pudo guardar los datos";             
    //-----------------unidad-------------------------------
       $nombre=$_POST['nombre_unidad'];
	$duracion =$_POST['duracion_unidad'];
	$obj_unidad=$_POST['obj'];
        $contenido=$_POST['contenido'];
        $metodologia=$_POST['tecnicas'];
        $evaluacion=$_POST['evaluacion'];
        $bibliografia=$_POST['bibliografia'];
        
        for ($i = 0; $i < count($nombre); $i++) {
        pg_query($con,"INSERT INTO unidad_antiguo(nomb_unidad_ant, duracion, objetivo_unidad, contenido_unidad, tecnicas, evaluacion, bibliografia_unidad) "
        . "VALUES('$nombre[$i]','$duracion[$i]','$obj_unidad[$i]','$contenido[$i]','$metodologia[$i]','$evaluacion[$i]','$bibliografia[$i]');")or die("Error en la Consulta SQL");
            //echo "$nombre";
        
        $idUni= "";
             $uni= pg_query($con,"SELECT MAX(id_unidad_ant) AS id_unidad_ant FROM unidad_antiguo;");
                     if ($row = pg_fetch_row($uni)) 
                    {
                            $idUni = trim($row[0]);
                       }
        
        pg_query($con,"UPDATE unidad_antiguo SET id_plan_antiguo='$id_plan_ant' WHERE id_unidad_ant='$idUni';")or die("Error en la Consulta SQL");
        }
        
        
             
             
      }
      
//echo"<div class=\"alert alert-danger\" role=\"alert\">El sistema esta en mantenimiento</div>";
header('Location: docente.php');
//echo '<meta http-equiv="REFRESH" content="0;url=./docente.php">';
}
   
pg_close($con);
?>
        
        
   