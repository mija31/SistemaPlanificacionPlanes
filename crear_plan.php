<?php
session_start();
$nomUsuario=$_SESSION["usuario"];
$nombre_url=$_GET['nombre'];
  //echo $nombre_url;
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
            
            
            $dato = pg_fetch_array($resultado);
                
                
               // $nombre_materia=$dato[1];
                //echo $nombre_materia;
                echo '<div class="panel panel-warning">
                
                  <div class="panel-heading">
                    <h4 class="panel-title">
                    <li><a class="nomb_link" data-toggle="collapse" data-parent="#accordion">'.$dato[0].'&nbsp > &nbsp'.$nombre_url.'<span class="glyphicon glyphicon-chevron-right"></span></a></li>
                     
                    </h4>
                  </div>
                  <div id="collapse" class="collapse_in">
                    <div class="panel-body">
                     <div class="btn-group-vertical" role="group" style="width:100%;">
                          <button type="button" class="btn btn-success btnVista">
                              Vista Previa&nbsp<span class="glyphicon glyphicon-eye-open form-control-feedback"></span> </button>
                          <button type="button" class="btn btn-success btnNuevo">
                              Crear PG. Nuevo&nbsp<span class="glyphicon glyphicon-pencil form-control-feedback"></span> </button>
                         <button type="button" class="btn btn-success btnAntiguo">
                              Crear PG. Antiguo&nbsp<span class="glyphicon glyphicon-pencil form-control-feedback"></span> </button>
                         <button type="button" class="btn btn-success btnEditar">
                            Editar &nbsp<span class="glyphicon glyphicon-edit form-control-feedback"></span></button>
                     </div>
                    </div>
                  </div>
        </div>';
                
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
  <div class="col-xs-12 col-sm-12 col-md-9" id="cuerpo">
      <!--<div class="imagen embed-responsive embed-responsive-16by9">
            <img class="embed-responsive-item" src="imagenes/bienvenido.gif">
      </div>-->
     <div id="pdf" class="embed-responsive embed-responsive-16by9">
            
        <div id='Planes_globales' class='panel panel-info'>
            <div class='panel-heading'><p class='text-uppercase'>nombre del documento</p></div>
            <div class='panel-body'> 
            <label>documentos</label>
            <div  class='table-condensed table-bordered table-responsive'>
             <table class='table table-bordered '>
            <thead>
                <tr>
                  <th></th>
                  <th>Nombre del documento</th>
                  <th><input type="button"  name="mostar_pdf" value="mostrar pdf"></th>
                  </tr>
            </thead>
            <tbody> 
         <?php
            require_once('conexion.php');
            $conexion = new Conexion();
            $con = $conexion->conectar();
            if(!$con )
            {
            echo "error de base de datos";
            }
            else{
            
            $res = pg_query($con,"select 
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
            ?>
            </tbody>
             </table>
            </div>
            </div>
        </div>
         
         <!--embed  class="embed-responsive-item" src="pdf/planGlobal.pdf"-->
      </div>
      
    
          
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
         $("#pdf").show("slow");
    });
     $(".btnNuevo").click(function(){ 
         $("#pdf").hide("slow");
         $("#form_antiguo").hide("slow");
          $(".opcional").hide("slow");
          $("#editar_nuevo").hide("slow");
        $("#form_nuevo").show("slow");
         
    });
    
     $(".btnAntiguo").click(function(){ 
           $("#pdf").hide("slow");
         $("#form_antiguo").show("slow");
          $(".opcional").hide("slow");
        $("#form_nuevo").hide("slow");
        $("#editar_nuevo").hide("slow");
    });
     $(".btnEditar").click(function(){ 
          $("#pdf").hide("slow");
         $("#editar_nuevo").show("slow");
          $(".opcional").hide("slow");
        $("#form_antiguo").hide("slow");
        $("#form_nuevo").hide("slow");

    });
    
    /*muestra la opcional*/
   $(".opcion").click(function(){ 
         $("#pdf").hide("slow");
         $(".form_crear").hide("slow");
        $(".opcional").show("slow");
    });
    
});
</script>
</html>