<!DOCTYPE html>
<html lang="es">
<head>
<title>FormA </title>
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
    <form role="form" name='crear_planAnt' method='POST' action='crear_planAnt.php'>
            <?php
            include("formA1.php");
            include("formA2.php");
            include("formA3.php");
            ?>
        <div id="nombreMat" hidden="yes">
            <input  type="text" class="form-control" name="seleccionado" value="<?php echo $nombre_url;?>" readonly="readonly">
            
        </div>
        <div class="row row-centered">
              <button  name="guardar_ant" type="submit" class="btn btn-danger">Guardar </button> 
              
           <button id="antiguo_cancelar" type="submit" class="btn btn-danger">Cancelar</button>
          </div>
    </form>
    
            
</form>
</body>
</html>