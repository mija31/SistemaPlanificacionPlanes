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
 
  <div class="container-fluid">
      <?php
      echo $_GET['carrera'];
      ?>
     <div id="visor_pdf" class="embed-responsive embed-responsive-16by9">
            <embed  class="embed-responsive-item" src="pdf/planGlobal.pdf">
      </div>
</div>
</body>

</html>