<html>
<head>
</head>
<body>
    <form role="form" action="validar_designacion.php" method="post" onsubmit="marcar_seleccionado()">
    
    <p class="bg-primary">1. SELECCIONE DOCENTE</p>
    <p>Seleccione un docente para luego asignarle carrera y materias.</p>
     <select  id="select_desig_doc" class="form-control" name="select_desig_doc">
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
              echo "<option id='opcion_desig_doc'+$contador>$dato[0]</option>";
                $contador++;
              }
            }
        pg_close($con);  
        ?> 
    </select><br>
     
<p class="bg-primary">2. SELECCIONE CARRERA O CARRERAS</p>
<p>1. Seleccione las carreras el las que dictará el docente seleccionado.</p>
<p>2. Tomar encuenta que todas las materias que selecionará posteriormente,
    serán asignadas a todas las carreras que seleccionó </p>
<p>3. Tenga mucho cuidado <span  class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true" form-control-feedback></span></p>
<div class="table-responsive">
<table class="table ">
        <thead>
        </thead>
        <thead>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select  id="sel1" class="form-control" name="sel1" size="5">
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
                              echo "<option id='opcion_desig_carr'+$contador>$dato[0]</option>";
                                $contador++;
                              }
                            }
                        pg_close($con);  
                        ?> 
                    </select>
                </td>
                <td>
                    <br>
                    <div class="row row-centered">
                    <input class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel1','sel2')" value="-->>"><br>
                    <input class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel2','sel1')" value="<<--">	 
                    </div>
                </td>
                <td>
                    <select  id="sel2" class="form-control" name="lista_carreras[]" multiple size="5">
                    <option value="-">-</option>";
                    </select>
                </td>
            </tr>
        </tbody>
    </table> 
    </div>
    
    <p class="bg-primary">3. SELECCIONE MATERIA O MATERIAS</p>
    <p>1. Traslade al lado derecho las materias que dictará el docente que fue selecionado anteriormente.</p>
    <p>2. Tomar encuenta que las materias se dictaran en todas las carreras selecionado anteriormente.</p>
    <div class="table-responsive">
    <table class="table">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td>
                      <select  id="sel3" class="form-control" name="sel3" size="5">
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
                              echo "<option id='opcion_desig_mat'+$contador>$dato[0]</option>";
                                $contador++;
                              }
                            }
                        pg_close($con);  
                        ?> 
                    </select>
                </td>
                <td><br>
                    <div class="row row-centered">
                      <input  class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel3','sel4')" value="-->>"><br>
                      <input class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel4','sel3')" value="<<--">	 
                   </div> 
                </td>
                <td>
                    <select  id="sel4" class="form-control" name="lista_materias[]" multiple size="5">
                    <option value="-">-</option>";
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
   <div class="row row-centered">
                    <button id="btn_carr"  type="submit" class="btn btn-danger" name="enviar_desig">Aceptar</button>      
            </div><br> 	
</form>
</body>
<script language="javascript">
function pasar(de,a) {
    obj=document.getElementById(de);
    obj2=document.getElementById(a);
     for (i=0; opt=obj.options[i]; i++)
                if (opt.selected) {
                    valor=opt.value; // almacenar value
                    txt=obj.options[i].text; // almacenar el texto
            if (obj.options.length==1){
                            obj.options[i].text="-";	
                            obj.options[i].value="-";	
                        }else{
                            obj.focus();
                            obj.options[i]=null;			
                        }	 
                if (obj2.options[0].value=='-') // si solo está la opción inicial borrarla
                    obj2.options[0]=null;

                if(valor!='-'){
                    opc = new Option(txt,valor);
                    eval(obj2.options[obj2.options.length]=opc);
                }
             }	 
             if (obj.options.length<=0){
                opc = new Option("-","");
                eval(obj.options[0]=opc);
                 return;
            } 
}	 
function marcar_seleccionado(){
obj1=document.getElementById('sel2');
for (i=0; i<obj1.options.length; i++){
	if(obj1.options[i].value!='-')
		obj1.options[i].selected=true;
	else
		obj1.options[i].selected=false;		
}

obj1=document.getElementById('sel4');
for (i=0; i<obj1.options.length; i++){
	if(obj1.options[i].value!='-')
		obj1.options[i].selected=true;
		else
		obj1.options[i].selected=false;		
}
}

</script>
</html>