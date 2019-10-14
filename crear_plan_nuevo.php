<?php
session_start();
$nomUsuario=$_SESSION["usuario"];?>
<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{

	if(isset($_POST['enviar'])){	
       
        $carga=$_POST['carga_horaria'];
	$justi=$_POST['justificacion2'];
	$obj=$_POST['objetivo'];
	$met=$_POST['metodologia2'];
        
        
        $crite=$_POST['criterios2'];
        $biblio=$_POST['bibliografia2'];
        
        
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
        
        pg_query($con, "INSERT INTO plan_nuevo (carga_hor,justificacion, objetivo, metodologia, evaluacion, bibliografia )
			VALUES ('$carga','$justi','$obj','$met','$crite','$biblio');") or die("Error en la Consulta SQL");
        
        
        
        $codMat = "";
          $idMat = pg_query($con,"SELECT cod_materia FROM materia  WHERE materia.cod_materia = '$id_mat';")or die("Error en la Consulta SQL");
          while($m = pg_fetch_array($idMat)){
            $codMat= $mat[0];
            }
        
        $id_plan_nue = "";
             $id_nue= pg_query($con,"SELECT MAX(id_plan_ant) AS id_plan_ant FROM plan_nuevo;");
                     if ($row = pg_fetch_row($id_nue)) 
                    {
                            $id_plan_nue = trim($row[0]);
                       }
                       
         $nombre_url=$_POST['seleccionado_nuevo'];
        pg_query($con,"UPDATE materia SET id_plan_ant='$id_plan_nue' WHERE nomb_materia='$nombre_url';")or die("Error en la Consulta SQL");
        
    //------------------------------materia relacionada------------    
        $relacionado=$_POST['lista_carreras'];
        for ($i = 0; $i < count($relacionado); $i++) {
            
             pg_query($con, "INSERT INTO materia_relacionado (mat_rel)
			VALUES ('$relacionado[$i]);") or die("Error en la Consulta SQL");
             
             $rel= "";
             $idRel= pg_query($con,"SELECT MAX(id_rel) AS id_rel FROM materia_relacionado;");
                     if ($row = pg_fetch_row($idRel)) 
                    {
                            $rel = trim($row[0]);
                       }
                       
        pg_query($con,"UPDATE materia_relacionado SET id_plan_ant='$id_plan_nue' WHERE id_rel='$rel';")or die("Error en la Consulta SQL");
        
        }
        
        
       //===============================================unididad
        
        $nomb=$_POST['nombreUnidad'];
        $obj_uni=$_POST['objetivoUnidad'];
        $conte=$_POST['contenido'];
        $dur_hrs=$_POST['durHsUnidad'];
        $dur_sem=$_POST['durSemUnidad'];
        
        for ($i = 0; $i < count($nomb); $i++) {
            
             pg_query($con, "INSERT INTO unidad_nuevo (nomb_unidad_nue, objetivo_nue, contenido_nue)
			VALUES ('$nomb[$i]','$obj_uni[$i]','$conte[$i]');") or die("Error en la Consulta SQL");
             
             pg_query($con, "INSERT INTO cronograma_duracion (duracion_hs, duracion_sem)
			VALUES ('$dur_hrs[$i]','$dur_sem[$i]');") or die("Error en la Consulta SQL");
             
        
        $idUni= "";
             $uni= pg_query($con,"SELECT MAX(id_unidad_nue) AS id_unidad_nue FROM unidad_nuevo;");
                     if ($row = pg_fetch_row($uni)) 
                    {
                            $idUni = trim($row[0]);
                       }
        
        
        $id_crono = "";
             $uni_nue= pg_query($con,"SELECT MAX(id_cron) AS id_cron FROM cronograma_duracion;");
                     if ($row = pg_fetch_row($uni_nue)) 
                    {
                            $id_crono = trim($row[0]);
                       }               
                       
        pg_query($con,"UPDATE unidad_nuevo SET id_plan_ant='$id_plan_nue' WHERE id_unidad_nue='$idUni';")or die("Error en la Consulta SQL");
        pg_query($con,"UPDATE cronograma_duracion SET id_unidad_nue='$idUni' WHERE id_cron='$id_crono';")or die("Error en la Consulta SQL");
        }
             
        
            
             
      }
      
//echo"<div class=\"alert alert-danger\" role=\"alert\">El sistema esta en mantenimiento</div>";
header('Location: docente.php');
//echo '<meta http-equiv="REFRESH" content="0;url=./docente.php">';
}
   
pg_close($con);
?>
        
        
   