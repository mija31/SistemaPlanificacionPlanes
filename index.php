<!DOCTYPE html>
<html lang="es">
<head>
<title>Sistema de Plan Global </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
       
        <link rel="stylesheet" href="css/styleCrear.css" type="text/css">
         <link rel="stylesheet" href="css/styles.css" type="text/css">
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
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbsp Inicio</a>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-king"></span>&nbsp Administrador</a>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp Docente</a>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-education"></span>&nbsp Estudiante</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" role="search" method="get" >
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar" name="texto_a_buscar">
            </div>
            <button id="buscar" onclick="openDialog();" type="submit" class="btn btn-default">Buscar</button>
        </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-8">    
      
      <?php
      include('fecha_hora.php');
      ?>
    </div>
         
    <div id="popup" class="popup">
    <a onclick="closeDialog('popup');" class="close"><img src="imagenes/cerrar30.png"></a>
    <div>
        <?php  require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
              echo "Error de conexión con base de datos";
        }
    else{
        require_once("buscador.php");
        $bus = new Buscador();
        $buscame = $bus->buscar();
       if(count($buscame)==0){
            echo "<h2>No hay resultados para su búsqueda...</h2>";
            }
        else{
           echo "<div class='list-group'> 
                 <a  class='list-group-item active'> Resultados de busqueda:";
                for($i=0;$i<sizeof($buscame);$i++){
                    $carr = $buscame[$i];
                 echo "<a href='visor_pdf.php?carrera=$carr' target='_Blank' class='list-group-item' name='elegido'>$carr</a>";
                }
           echo "</div>";
            }
        }
 ?>
    </div>
</div>
    
  <div class="col-xs-12 col-sm-12 col-md-4">
            
    <?php
include('cuadro_autentificacion.php');
 ?>
     
  </div>
</div>
    
    
</div>
</body>
<script type="text/javascript">
        //para mostrar la ventana emergente de buscador
function openDialog() {
    $('#overlay').fadeIn('fast', function() {
        $('#popup').css('display','block');
        $('#popup').animate({'left':'30%'},500);
         
    });
}

function closeDialog(id) {
    $('#'+id).css('position','absolute');
    $('#'+id).animate({'left':'-100%'}, 500, function() {
        $('#'+id).css('position','fixed');
        $('#'+id).css('left','100%');
        $('#overlay').fadeOut('fast');
        
    });
}
</script>
</html>