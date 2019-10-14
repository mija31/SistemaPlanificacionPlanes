<?php
session_start();
$nomUsuario=$_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Docentes </title>
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
    <!--Barra de navegacion
============================================================-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbsp Inicio</a>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-king"></span>&nbsp Docente</a>
    </div>
    <ul class="nav navbar-nav">
      <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $_SESSION["usuario"];?></a></li>
      <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>


   
<div class="container_doc">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-3">      
          <!-- Ver, Crear o ModificarPlan Global
    ================================================== -->
    <div id="panel-principal" class="panel panel-primary panel-collapse">
        <div class="panel-heading">Opciones Plan Global</div>
         <label>Carrera:&nbspMateria</label>
      <div class="panel-group" id="accordion">
        <?php

        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "error de base de datos";
        }
        else{
            $id_doc = "";
            $id_usuario = pg_query($con,"SELECT cod_doc FROM docente d WHERE d.nomb_doc = '$nomUsuario';");
            while($aux = pg_fetch_array($id_usuario)){
            $id_doc= $aux[0];
            //echo "$id_doc";
            }
            $resultado = pg_query($con,"SELECT CA.nomb_carr, MA.nomb_materia
                                        FROM designado DE, carrera CA, materia MA
                                        WHERE DE.cod_doc = '$id_doc' and DE.cod_carr = CA.cod_carr and DE.cod_materia = MA.cod_materia;");
            
            $cont = 1;
            while($dato = pg_fetch_array($resultado)){
                
                
               // $nombre_materia=$dato[1];
                //echo $nombre_materia;
                echo '<div class="panel panel-warning">
                
                  <div class="panel-heading">
                    <h4 class="panel-title">
                    <li><a class="nomb_link"  href="crear_plan.php?nombre='.$dato[1].'">'.$dato[0].'&nbsp > &nbsp'.$dato[1].'<span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </h4>
                  </div>
                </div>';
                $cont++;
                        }                   
            }
        pg_close($con);
        ?> 
        </div>
        </div>
      <!-- OTRAS OPCIONES
    ================================================== -->
    <div class="panel panel-primary panel-collapse">
        <div class="panel-heading">OPCIONES ADICIONALES</div>
          <li class="list-group-item list-group-item-info opcion">Logo,Pie y Encabezado de  pagina<span  class="glyphicon glyphicon-plus form-control-feedback"></span></li>
        </div>

 <div class="panel panel-info panel-collapse">
  <div class="panel-heading">Lista de Planes Guardados</div>
  <div class="panel-body">
    <a href="">planGlobal.pdf&nbsp<span class="glyphicon glyphicon-file form-control-feedback"></span></a>
  </div>
    </div>
         
</div>
    <!-- TODO DEL MEDIO
==========================================================-->
          
      <!--Desde aqui empieza las opciones de modificar-->
          <div id="form_nuevo">
              <?php
           include("form_nuevo.php");
            ?>
          </div>   
          <div id="form_antiguo">
              <?php
            include("form_antiguo.php");
            ?>
          </div>
      <div id="editar_nuevo">
              <?php
            include("editar_nuevo.php");
            ?>
          </div>  
      
      
      <div class="opcional">
           <?php
      include("opcional.php");
      ?>
      </div>
             
  </div>
</div><!--fin de row-->
<div class="footer">
    <?php
    include('barra_final.php');
    ?>
</div>
</div>
</body>
<script> 
$(document).ready(function(){
     /*var ancho = $('.col-sm-6').width();
     $('embed.mostrar-pdf').width(ancho);*/
     $(".carrera-0").click(function(){
         for(var i=0; i <= 20 ;i++){
             $(".materia-0-"+i).slideToggle("slow");
         }     
        });
    $(".carrera-1").click(function(){
         for(var i=0; i <= 20 ;i++){
             $(".materia-1-"+i).slideToggle("slow");
         }     
        }); 
      
      $(".materia-0-0").click(function(){
             $(".plan-0-0").slideToggle("slow");
        });
     $(".materia-0-1").click(function(){
             $(".plan-0-1").slideToggle("slow");
        });
    /*opciones de crear o modificar*/
  $(".btnVista").click(function(){ 
        $("#form_antiguo").hide("slow");
        $("#form_nuevo").hide("slow");
        $("#editar_nuevo").hide("slow");
         $(".opcional").hide("slow");
         $("#ver_pdf").show("slow");
    });
     $(".btnNuevo").click(function(){ 
         $("#ver_pdf").hide("slow");
         $("#form_antiguo").hide("slow");
          $(".opcional").hide("slow");
          $("#editar_nuevo").hide("slow");
        $("#form_nuevo").show("slow");
         
    });
    
     $(".btnAntiguo").click(function(){ 
           $("#ver_pdf").hide("slow");
         $("#form_antiguo").show("slow");
          $(".opcional").hide("slow");
        $("#form_nuevo").hide("slow");
        $("#editar_nuevo").hide("slow");
    });
     $(".btnEditar").click(function(){ 
          $("#ver_pdf").hide("slow");
         $("#editar_nuevo").show("slow");
          $(".opcional").hide("slow");
        $("#form_antiguo").hide("slow");
        $("#form_nuevo").hide("slow");

    });
    
    /*muestra la opcional*/
   $(".opcion").click(function(){ 
         $("#ver_pdf").hide("slow");
         $(".form_crear").hide("slow");
        $(".opcional").show("slow");
    });
    
});
</script>
</html>