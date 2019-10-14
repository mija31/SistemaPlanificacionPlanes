<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{

	if(isset($_POST['enviar_doc'])){	

         $boton_seleccionado = $_POST['optionsRadios3'];
    //boton radio primero seleccionado para agregar un docente----------------
       if($boton_seleccionado == "agregar_doc"){
            $cod_doc =$_POST['cod_doc'];
            $ci_doc =$_POST['ci_doc'];
            $nomb_doc =$_POST['nomb_doc'];
            $apellido_pat_doc =$_POST['apell_pat_doc'];
            $apellido_mat_doc =$_POST['apell_mat_doc'];
            $dir_doc = $_POST['dir_doc'];
            $tel_doc = $_POST['tel_doc'];
            $cel_doc = $_POST['cel_doc'];
            $email_doc = $_POST['email_doc'];
      //obtenemos el id de docente en caso de que se presente docente repetido--
       $codigos_doc = pg_query($con,"select cod_doc
                            from docente;") or die("Error en ingresar codigo docente");
        $existe = false;
        while($valor = pg_fetch_array($codigos_doc)){
            if($valor[0] == $cod_doc){          
                $existe = true;
            }
        }//while
        
    if(!$existe){
        $sql ="insert into docente
        values('$cod_doc',$ci_doc,'$nomb_doc','$apellido_pat_doc','$apellido_mat_doc','$dir_doc',$tel_doc,$cel_doc,'$email_doc');";
        
        pg_query($con, $sql) or die("Error en la Consulta SQL");
        $reg_usuario = "INSERT INTO usuario(usuario,contrasena,privilegio) values('$nomb_doc','$ci_doc',1)";
        pg_query($con, $reg_usuario) or die("Error en la consulta");
        
       echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
    }
        else{
            echo "codigo de carrera repetido";
        }	    
       }
         //boton radio segundo seleccionado para eliminar docente---------------
           else{
                $docente_seleccionado = $_POST['select_doc']; 
           pg_query($con,"delete 
                            from docente
                            where nomb_doc = '$docente_seleccionado';") or die("Error en la eliminacion de docente");
            echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
           }
	
    }//isset
}
pg_close($con);
?>