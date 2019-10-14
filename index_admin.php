<?php

session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Administrador </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <script src="js/jquery-2.1.4.min.js"></script>
     <script src="js/bb-confirm.js"></script>
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
---------------menu---------------------
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
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $_SESSION["usuario"];?> <span class="caret"></span>
            </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Ver Perfil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
---------------fin menu-------------- 
    <div class="container">
        <div class="col-md-3">
           <div id="opciones" class="panel panel-primary">
            <div class="panel-heading">VISTA PRELIMINAR</div>
            <div class="panel-body">
                 <button id="vista_fac" type="button" class="btn btn-success btn-block">Facultad / Carreras <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"  form-control-feedback></span></button>
                <button id="vista_desig" type="button" class="btn btn-success btn-block">DESIGNACIÓN<br>(doc-carr-mat) <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"  form-control-feedback></span></button>
         </div>
        </div>
            
        <div id="opciones" class="panel panel-primary">
            <div class="panel-heading">OPCIONES (crear/eliminar)</div>
            <div class="panel-body">
                 <button id="fac" type="button" class="btn btn-success btn-block">Facultad <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"  form-control-feedback></span></button>
                 <button id="carr" type="button" class="btn btn-success  btn-block">Carrera<span  class="glyphicon glyphicon-chevron-right" aria-hidden="true" form-control-feedback></span</button>
                     <button id="doc" type="button" class="btn btn-success  btn-block">Docente<span  class="glyphicon glyphicon-chevron-right" aria-hidden="true" form-control-feedback></span</button>
                 <button id="mat" type="button" class="btn btn-success  btn-block">Materia<span  class="glyphicon glyphicon-chevron-right" aria-hidden="true" form-control-feedback></span</button>
         </div>
        </div>
                         
     <div id="designacion" class="panel panel-primary">
            <div class="panel-heading">OP. DESIGNACIÓN (Doc-Carr-Mat)</div>
            <div class="panel-body">
                 <button id="desig" type="button" class="btn btn-success  btn-block">Designación<span  class="glyphicon glyphicon-chevron-right" aria-hidden="true" form-control-feedback></span></button>
         </div>
        </div>
        </div>
         <!--Bien venido administrador ......................................-->
        <div id="div_con" class="col-md-9">
            <p>Bienvenido señor administrador........</p>

       </div>
    </div>  
</div>
</body>
<script>
$(document).ready(function(){
   $("#fac").click(function(evento){
      evento.preventDefault();
      $("#div_con").load("admin_opciones.php #facultad",function(){
         /* $('#btn_c').click(function(){
	       $("#opciones").hide("slow");*/
             
        if( $("#optionsRadios1").is(':checked')) {
             $("#selector_elim_fac").hide();
        } 
          $("#optionsRadios1" ).click(function() {
              $("#nomb_fac").show();
              $("#cod_fac").show();
              $("#selector_elim_fac").hide();
            });
          $("#optionsRadios2" ).click(function() {
                $("#nomb_fac").hide();
               $("#cod_fac").hide();
                $("#selector_elim_fac").show();
            });
         
       });
   });
    //eventos de carrera-------------------------------------------------------------
    $("#carr").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_opciones.php #carrera",function(){
          
        if( $("#optionsRadios3").is(':checked')) {
             $("#selector_elim_carr").hide();
        } 
        $("#optionsRadios3").click(function() { 
             $("#selector").show();
             $("#cod").show();
             $("#nomb").show();
             $("#tipo").show();
             $("#version").show();
             $("#region").show();
            $("#selector_elim_carr").hide();
             });
         $("#optionsRadios4").click(function() { 
            $("#selector").hide();
            $("#cod").hide();
            $("#nomb").hide();
            $("#tipo").hide();
            $("#version").hide();
            $("#region").hide();
            $("#selector_elim_carr").show();
         });
      });
   }); 
    //opcion de eventos de docente------------------------------------------------------
     $("#doc").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_opciones.php #docente",function(){
          
        if( $("#optionsRadios7").is(':checked')) {
             $("#selector_elim_doc").hide();
        } 
        $("#optionsRadios7").click(function() { 
             $("#cod_doc").show();
             $("#ci_doc").show();
             $("#nomb_doc").show();
             $("#apell_pat_doc").show();
             $("#apell_mat_doc").show();
             $("#dir_doc").show();
             $("#tel_doc").show();
             $("#cel_doc").show();
             $("#email_doc").show();
             $("#selector_elim_doc").hide();
             });
         $("#optionsRadios8").click(function() { 
             $("#cod_doc").hide();
             $("#ci_doc").hide();
             $("#nomb_doc").hide();
             $("#apell_pat_doc").hide();
             $("#apell_mat_doc").hide();
             $("#dir_doc").hide();
             $("#tel_doc").hide();
             $("#cel_doc").hide();
             $("#email_doc").hide();
             $("#selector_elim_doc").show();
         });
      });
   }); 
    //opcion de eventos de materia------------------------------------------------------------
       $("#mat").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_opciones.php #materia",function(){
          
        if( $("#optionsRadios5").is(':checked')) {
             $("#selector_elim_mat").hide();
        } 
        $("#optionsRadios5").click(function() { 
             $("#cod_mat").show();
             $("#nomb_mat").show();
             $("#nivel_mat").show();
             $("#electiva_mat").show();
             $("#sigla_mat").show();
             $("#pre_req_mat").show();
             $("#selector_carr_mat").show();
             $("#selector_elim_mat").hide();
           
             });
         $("#optionsRadios6").click(function() { 
           $("#cod_mat").hide();
             $("#nomb_mat").hide();
             $("#nivel_mat").hide();
             $("#electiva_mat").hide();
             $("#sigla_mat").hide();
             $("#pre_req_mat").hide();
             $("#selector_carr_mat").hide();
             $("#selector_elim_mat").show();
         });
          //desde aqui empieza para aumentar un prerequisito-----------
                var cont = 0;
                // Crear un elemento div añadiendo estilos CSS
                var container = $(document.getElementById("pre_requisitos"));
                $('#btn_mas').click(function() {
                if (cont <= 9) {
                    cont = cont + 1;
                  $(container).append('<div class="input-group" id="pre'+cont+'">'+
                                    '<span class="input-group-addon">'+cont+'. Ingrese codigo de materia:</span>'+
                                    '<input id="preReq'+cont+'"  type="text" class="form-control">'+
                                    '</div>');
                    $('#pre_requisitos').after(container);
                    
                    }
                    else { //se establece un limite para añadir elementos, 20 es el limite

                         Messenger().post({
                                          message: "Llegó al maximo..",
                                          hideAfter: 2,
                                          hideOnNavigate: true
                                        });

                        }
                });
 
            $('#btn_menos').click(function() { // Elimina un elemento por click
            if (cont > 0) {
                $('#pre' + cont).remove(); 
                cont = cont - 1; 
            }
             else{
                if (cont == 0) { 

                      Messenger().post({
                                      message: "No puede eliminar más..",
                                      hideAfter: 2,
                                      hideOnNavigate: true
                                    });

                    }}
                });
           });
     }); 
    //son para las vistas previas de facultad y sus carreras
     $("#vista_fac").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_vista.php #vista_facultad",function(){
          
      });
   });
    // muestra la vista preliminar de designacion doc-carr-mat
     $("#vista_desig").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_vista.php #vista_designacion",function(){
          
      });
   });
     //carga para designacion de docente-carrera-materia
     $("#desig").click(function(event){
      event.preventDefault();
      $("#div_con").load("admin_designar.php",function(){
          
      });
   }); 
   
});  
</script>
</html>