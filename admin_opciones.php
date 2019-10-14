<!DOCTYPE html>

<html lang="es">
<head> 
    
</head>  
<body>     
    <div class="container">         
        <div id="facultad" class="panel panel-danger">
            <div class="panel-heading">OPCIONES DE FACULTAD</div>
            <div class="panel-body">
    <form role="form" method="post" action="validar_facultad.php">
         <div class="radio">
      <label>
        <input type="radio" name="optionsRadios0" id="optionsRadios1" value="agregar_fac" checked>
        Seleccione esta opción si desea agregar una nueva Facultad.
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios0" id="optionsRadios2" value="eliminar_fac">
         Seleccione esta opción si desea eliminar una Facultad.
      </label>
    </div>
      <div class="form-group" id="cod_fac">
        <label for="cod_fac">Código de Facultad:</label>
        <input type="number" class="form-control"  placeholder="Ingrese codigo..." name="cod_fac">
      </div>
      <div class="form-group" id="nomb_fac" >
        <label for="nomb_fac">Nombre de Facultad:</label>
        <input type="text" class="form-control" placeholder="Ingrese el nombre..." name="nomb_fac">
      </div>
      <div id="selector_elim_fac">
    <label for="select">Seleccione Facultad que desea eliminar:</label>
          
     <select  id="select" class="form-control" name="select_facultad">
     <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select nomb_facu
                                        from facultad;");
            $contador = 0;
            while($dato = pg_fetch_array($resultado)){
              echo "<option id='opcion_elim_fac'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);
        ?> 
    </select>
   </div><br>
        <!--<div class="has-warning">
          <div class="checkbox">
            <label>
              <input type="checkbox" id="checkboxWarning" value="option1">
              Está seguro de realizar el cambio ??
            </label>
          </div>
        </div>-->
        <div class="row row-centered">
                 <button id="btn_fac" type="submit" class="btn btn-danger" name="enviar_facu">Aceptar</button>
        </div> 
</form>
</div>
        
            
</div>
<div id="carrera" class="panel panel-danger">
            <div class="panel-heading">OPCIONES DE CARRERA</div>
            <div class="panel-body">
 <form role="form" method="post" action="validar_carrera.php">
    <div class="radio">
  <label>
    <input type="radio" name="optionsRadios1" id="optionsRadios3" value="agregar_carr" checked>
    Seleccione esta opción si desea agregar una nueva Carrera.
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios1" id="optionsRadios4" value="eliminar_carr">
     Seleccione esta opción si desea eliminar una Carrera.
  </label>
</div>
    <div id="selector">
    <label for="select">Seleccione Facultad donde desea agregar la carrera:</label>
     <select  id="select" class="form-control" name="select_fac_carr">
     <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select nomb_facu
                                        from facultad;");
            $contador = 0;
            while($dato = pg_fetch_array($resultado)){
              echo "<option id='opcion_'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);
        ?> 
    </select>
    </div>
     <div id="selector_elim_carr">
    <label for="select">Seleccione Carrera que desea eliminar:</label>
     <select  id="select_carrera" class="form-control" name="select_carrera">
     <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select nomb_carr
                                        from carrera;");
            $contador = 0;
            while($dato = pg_fetch_array($resultado)){
              echo "<option id='opcion_elim_carr'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);
        
        ?> 
    </select>
   </div><br>
          <div class="form-group" id="cod">
            <label for="cod">Código de Carrera:</label>
            <input type="text" class="form-control" name="cod_carr" placeholder="Ingrese código de carrera...">
          </div>
          <div class="form-group" id="nomb">
            <label for="nomb">Nombre de Carrera:</label>
            <input type="text" class="form-control" name="nomb_carr" placeholder="Ingrese nombre de carrera...">
          </div>
          <div class="form-group" id="tipo">
                <label for="select">Tipo de Carrera:</label>
                 <select  id="select" class="form-control" name="tipo_carr">
                     <option>Carrera</option>
                     <option>Programa</option>
                </select>
          </div>
          <div class="form-group" id="version">
                <label for="select">Versión de Carrera:</label>
                 <select  id="select" class="form-control" name="version_carr">
                     <option>0</option>
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                </select>
          </div>
          <div class="form-group"  id="region">
            <label for="region">Región de la Carrera:</label>
            <input type="text" class="form-control" name="region_carr" placeholder="Ingrese la región...">
          </div>
    <!--
            <div class="has-warning">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="checkboxWarning1" value="option1">
                  Está seguro de realizar el cambio ??
                </label>
              </div>
            </div>
-->
            <div class="row row-centered">
                    <button id="btn_carr"  type="submit" class="btn btn-danger" name="enviar_carr">Aceptar</button>      
            </div> 
        </form>
        </div>
    </div>
         <!--LA OPCION DE DOCENTE.............................................................-->
<div id="docente" class="panel panel-danger">
            <div class="panel-heading">OPCIONES DE DOCENTE</div>
            <div class="panel-body">
 <form role="form" method="post" action="validar_docente.php">
    <div class="radio">
  <label>
    <input type="radio" name="optionsRadios3" id="optionsRadios7" value="agregar_doc" checked>
    Si desea agregar un(a) Docente.
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios3" id="optionsRadios8" value="eliminar_doc">
     Si desea eliminar un(a) Docente.
  </label>
</div>
     <!--opcion para eliminar---------------materia-->
     <div id="selector_elim_doc">
    <label for="select">Seleccione Docente que desea eliminar:</label>
     <select  id="select_doc" class="form-control" name="select_doc">
     <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select nomb_doc
                                        from docente;");
            $contador = 0;
            while($dato = pg_fetch_array($resultado)){
              echo "<option id='opcion_elim_doc'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);  
        ?> 
    </select>
   </div><br>
          <div class="form-group" id="cod_doc">
            <label for="cod_doc">Código Docente:</label>
            <input type="text" class="form-control" name="cod_doc" placeholder="Ingrese código docente...">
          </div>
          <div class="form-group" id="ci_doc">
            <label for="ci_doc">C.I. Docente:</label>
            <input type="text" class="form-control" name="ci_doc" placeholder="Ingrese C.I...">
          </div>
          <div class="form-group" id="nomb_doc">
            <label for="nomb_doc">Nombre Docente:</label>
            <input type="text" class="form-control" name="nomb_doc" placeholder="Ingrese nombre...">
          </div>
          <div class="form-group" id="apell_pat_doc">
            <label for="apell_pat_doc">Apellido Paterno Docente:</label>
            <input type="text" class="form-control" name="apell_pat_doc" placeholder="Ingrese apellido paterno...">
          </div>
          <div class="form-group" id="apell_mat_doc">
            <label for="apell_mat_doc">Apellido Materno Docente:</label>
            <input type="text" class="form-control" name="apell_mat_doc" placeholder="Ingrese apellido materno...">
          </div>
          <div class="form-group" id="dir_doc">
            <label for="dir_doc">Dirección Docente:</label>
            <input type="text" class="form-control" name="dir_doc" placeholder="Ingrese dirección...">
          </div>
          <div class="form-group" id="tel_doc">
            <label for="tel_doc">Telefono fijo Docente:</label>
            <input type="text" class="form-control" name="tel_doc" placeholder="Ingrese tel. fijo...">
          </div>
          <div class="form-group" id="cel_doc">
            <label for="cel_doc">Celular Docente:</label>
            <input type="text" class="form-control" name="cel_doc" placeholder="Ingrese celular...">
          </div>
          <div class="form-group" id="email_doc">
            <label for="email_doc">Correo Electrónico Docente:</label>
            <input type="text" class="form-control" name="email_doc" placeholder="Ingrese correo electrónico...">
          </div>
          <div class="row row-centered">
                    <button id="btn_doc"  type="submit" class="btn btn-danger" name="enviar_doc">Aceptar</button>      
          </div> 
        </form>
        </div>
    </div>
        <!--LA OPCION DE MATERIA.............................................................-->
<div id="materia" class="panel panel-danger">
            <div class="panel-heading">OPCIONES DE MATERIA</div>
            <div class="panel-body">
 <form role="form" method="post" action="validar_materia.php">
    <div class="radio">
  <label>
    <input type="radio" name="optionsRadios2" id="optionsRadios5" value="agregar_mat" checked>
    Si desea agregar una nueva Materia.
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios2" id="optionsRadios6" value="eliminar_mat">
     Si desea eliminar una Materia.
  </label>
</div>
     <!--opcion para eliminar---------------materia-->
    <div id="selector_elim_mat">
    <label for="select">Seleccione Materia que desea eliminar:</label>
     <select  id="select_mat" class="form-control" name="select_mat">
     <?php
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con )
        {
            echo "Error de conexión con base de datos";
        }
        else{
            $resultado = pg_query($con,"select nomb_materia
                                        from materia;");
            $contador = 0;
            while($dato = pg_fetch_array($resultado)){
              echo "<option id='opcion_elim_mat'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);
        
        ?> 
    </select>
   </div><br>
          <div class="form-group" id="cod_mat">
            <label for="cod_mat">Código Materia:</label>
            <input type="text" class="form-control" name="cod_mat" placeholder="Ingrese código de materia...">
          </div>
          <div class="form-group" id="nomb_mat">
            <label for="nomb_mat">Nombre Materia:</label>
            <input type="text" class="form-control" name="nomb_mat" placeholder="Ingrese nombre de materia...">
          </div>
          <div class="form-group" id="nivel_mat">
                <label for="select">Nivel Materia:</label>
                 <select  id="select" class="form-control" name="nivel_mat">
                     <option>A</option>
                     <option>B</option>
                     <option>C</option>
                     <option>D</option>
                     <option>E</option>
                     <option>F</option>
                     <option>G</option>
                     <option>H</option>
                     <option>I</option>
                     <option>J</option>
                </select>
          </div>
          <div class="form-group" id="electiva_mat">
                <label for="select">La Materia es Electiva?</label>
                 <select  id="select" class="form-control" name="electiva_mat">
                     <option>SI</option>
                     <option>NO</option>
                </select>
          </div>
          <div class="form-group"  id="sigla_mat">
            <label for="sigla_mat">Sigla Materia:</label>
            <input type="text" class="form-control" name="sigla_mat" placeholder="Ingrese su sigla...">
          </div>
          <div class="form-group"  id="pre_req_mat">
            <label for="sigla_mat">Pre-Requisistos (si requiere):</label>
            <button type="button" id="btn_mas" class="btn btn-success btn-xs" >&nbsp&nbsp<span class="glyphicon glyphicon-plus" ></span>&nbsp&nbsp</button>
            <button type="button" id="btn_menos" class="btn btn-success btn-xs">&nbsp&nbsp<span class="glyphicon glyphicon-minus"></span>&nbsp&nbsp</button>
               <div id="pre_requisitos">
                    <div id="pre_r">
                <!--en este espacio se guardará los requisitos que se aumentara-->
               </div>
                <!--en este espacio se guardará los requisitos que se aumentara-->
               </div>
          </div>
            <div class="row row-centered">
                    <button id="btn_mat"  type="submit" class="btn btn-danger" name="enviar_mat">Aceptar</button>      
            </div> 
        </form>
        </div>
    </div>
</div>
</body>  
</html>