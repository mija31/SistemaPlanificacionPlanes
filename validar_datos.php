<?php
 session_start();
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();

if(!$con )
{
    echo "error de base de datos";
}
else{
           
    
    if(isset($_POST['validar'])){
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["pass"] = $_POST["password"];
        
        $sql = "SELECT usuario, contrasena, privilegio FROM usuario";
        $res = pg_query($con, $sql) or die("Error de consulta");
        
        $existe = false;
        while($valor = pg_fetch_array($res)){
            if($valor[0] == $_SESSION["usuario"] && $valor[1]== $_SESSION["pass"] && $valor[2] == 0){          
                $existe = true;
                $admin = true;
            }
            if($valor[0] == $_SESSION["usuario"] && $valor[1]== $_SESSION["pass"] && $valor[2] == 1){          
                $existe = true;
                $admin = false;
            }
        }
    
        if($existe){
            
            if($admin)
               echo '<meta http-equiv="REFRESH" content="0;url=./index_admin.php">'; 
            if($admin== false)
                echo '<meta http-equiv="REFRESH" content="0;url=./docente.php">'; 
        }
        else{
            $message = "Error en Autentificacion";
            echo "<script type='text/javascript'>alert('$message');</script>";
            //echo " <script language=’JavaScript’> alert(‘JavaScript dentro de PHP’); </script>";
            //echo"<div class=\"alert a0ert-dan\"alert\">Error en Autentificacion</br> Ingrese nuevamente sus datos </div>";
            echo '<meta http-equiv="REFRESH" content="0;url=./index.php">';
        }
                
    }
    
}
pg_close($con);

?>
