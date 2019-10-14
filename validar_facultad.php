<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{
	if(isset($_POST['enviar_facu'])){	
        
         $boton_seleccionado = $_POST['optionsRadios0'];
	//en caso de que se haya selecionado la opcion de insertar-----------
        if($boton_seleccionado == "agregar_fac"){
            $codigo_facultad =$_POST['cod_fac'];
            $nombre_facultad =$_POST['nomb_fac'];

            $codigo = pg_query($con,"select cod_facu
                                from facultad;");
            $existe = false;
            while($valor = pg_fetch_array($codigo)){
                if($valor[0] == $codigo_facultad){          
                    $existe = true;
                }
            }//while
            if(!$existe){
                $sql ="insert into facultad
                values($codigo_facultad,'$nombre_facultad');";
                pg_query($con, $sql) or die("Error en la Consulta SQL");
                echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
            }
                else{
                    echo "codigo repetido";
                }	    
            }
          // en caso de que se desee eliminar una facultad--------
        else{
            $facultad_seleccionado = $_POST['select_facultad']; 
           pg_query($con,"delete 
                            from facultad
                            where nomb_facu = '$facultad_seleccionado';") or die("Error en la eliminacion");
            echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
        }
  
	
    }//isset
}
pg_close($con);
?>