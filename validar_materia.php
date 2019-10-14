<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{

	if(isset($_POST['enviar_mat'])){	

         $boton_seleccionado = $_POST['optionsRadios2'];
    //boton radio primero seleccionado para agregar una carrera----------------
       if($boton_seleccionado == "agregar_mat"){
            $codigo_mat =$_POST['cod_mat'];
            $nombre_mat =$_POST['nomb_mat'];
            $nivel_mat =$_POST['nivel_mat'];
            $electiva_mat =$_POST['electiva_mat'];
            $sigla_mat =$_POST['sigla_mat'];
      //
        //obtine la lista de lops codigos de las diferentes carreras
       $cod_materias = pg_query($con,"select cod_materia
                            from materia;");
        $existe = false;
        while($valor = pg_fetch_array($cod_materias)){
            if($valor[0] == $codigo_mat){          
                $existe = true;
            }
        }//while
        
    if(!$existe){
        $sql ="insert into materia(cod_materia, nomb_materia, nivel, electiva, sigla)
        values('$codigo_mat','$nombre_mat','$nivel_mat','$electiva_mat','$sigla_mat');";
        
        pg_query($con, $sql) or die("Error en la Consulta SQL");
    
        
       echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
    }
        else{
            echo "codigo de carrera repetido";
        }	    
       }
         //boton radio segundo seleccionado para eliminar materia---------------
           else{
                $materia_seleccionado = $_POST['select_mat']; 
           pg_query($con,"delete 
                            from materia
                            where nomb_materia = '$materia_seleccionado';") or die("Error en la eliminacion de materia");
            echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
           }
	
    }//isset
}
pg_close($con);
?>