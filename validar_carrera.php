<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{

	if(isset($_POST['enviar_carr'])){	

         $boton_seleccionado = $_POST['optionsRadios1'];
    //boton radio primero seleccionado para agregar una carrera----------------
       if($boton_seleccionado == "agregar_carr"){
            $codigo_carr =$_POST['cod_carr'];
            $nombre_carr =$_POST['nomb_carr'];
            $tipo_carr =$_POST['tipo_carr'];
            $version_carr =$_POST['version_carr'];
            $region_carr =$_POST['region_carr'];
            $facultad_select = $_POST['select_fac_carr'];
        //obtiene el id de facultad donde se insertara la carrera.
          $cod_fac = pg_query($con,"select cod_facu
                                        from facultad 
                                        where nomb_facu = '$facultad_select';") or die("Error en la facultad seleccionada"); 
          $data = pg_fetch_row($cod_fac);
        //obtine la lista de lops codigos de las diferentes carreras
       $codigos_carr = pg_query($con,"select cod_carr
                            from carrera;");
        $existe = false;
        while($valor = pg_fetch_array($codigos_carr)){
            if($valor[0] == $codigo_carr){          
                $existe = true;
            }
        }//while
        
    if(!$existe){
        $sql ="insert into carrera
        values($codigo_carr,$data[0],'$nombre_carr','$tipo_carr',$version_carr,'$region_carr');";
        
        pg_query($con, $sql) or die("Error en la Consulta SQL");
        
       echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
    }
        else{
            echo "codigo de carrera repetido";
        }	    
       }
         //boton radio segundo seleccionado para eliminar carrera---------------
           else{
                $carrera_seleccionado = $_POST['select_carrera']; 
           pg_query($con,"delete 
                            from carrera
                            where nomb_carr = '$carrera_seleccionado';") or die("Error en la eliminacion de carrera");
            echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
           }
	
    }//isset
}
pg_close($con);
?>