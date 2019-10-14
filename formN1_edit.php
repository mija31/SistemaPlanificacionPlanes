
<?php
require_once('conexion.php');
$conexion = new Conexion();
$con = $conexion->conectar();
if(!$con )
{
    echo "error de base de datos";
}
else{
    $cargaHoraria="";
    /*$justificacion="";
    $obj="";
    $metodo="";
    $evalu="";
    $bibio="";
    */
}
    $consulta= pg_query($con,"SELECT carga_hor FROM plan_nuevo WHERE id_plan_ant='1';");
    while($res=  pg_fetch_array($consulta)) {
        $cargaHoraria=$res[0];
       /* $justificacion=$res[2];
        $obj=$res[3];
        $metodo=$res[4];
        $evalu=$res[5];
        $bibio=$res[6];*/
    }
    pg_close($con);
?>






<div class="panel panel-primary">
        <div class="panel-heading">I. DATOS DE IDENTIFICACIÓN</div>
        <div class="panel-body">
            <div class="form-group">
                <label for="carga" class="col-sm-4 control-label">CARGA HORARIA:</label>
                <div class="col-sm-8">
                    <input type="text" name="carga_horaria" class="form-control" id="carga" placeholder="Carga horaria.." value="<?php echo $cargaHoraria;?>">
                    
                </div>
              </div><br>
              <div class="form-group">
                <label for="materias2" class="control-label">MATERIAS RELACIONADAS:</label>
                  <p>Tomar nota que solo se mostrará materias de NIVEL más inferior para ser selecionadas</p>
                <div class="table-responsive">
<table class="table ">
        <thead>
        </thead>
        <thead>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select  id="sel_1" class="form-control" name="sel_1" size="5">
                     <?php
                        require_once('conexion.php');
                        $conexion = new Conexion();
                        $con = $conexion->conectar();
                        if(!$con )
                        {
                            echo "Error de conexión con base de datos";
                        }
                        else{
                            $resultado = pg_query($con,"SELECT nomb_materia FROM materia; ");
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
                    <input class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel_1','sel_2')" value="-->>"><br>
                    <input class="btn btn-warning btn-sm" type="button" name="pasarValor1" onclick="pasar('sel_2','sel_1')" value="<<--">	 
                    </div>
                </td>
                <td>
                    <select  id="sel_2" class="form-control" name="lista_carreras[]" multiple size="5">
                    <option value="<?php
                        require_once('conexion.php');
                        $conexion = new Conexion();
                        $con = $conexion->conectar();
                        if(!$con )
                        {
                            echo "Error de conexión con base de datos";
                        }
                        else{
                            $resultado = pg_query($con,"SELECT nomb_materia FROM materia; ");
                            $contador = 0;
                            while($dato = pg_fetch_array($resultado)){
                              echo "<option id='opcion_desig_carr'+$contador>$dato[0]</option>";
                                $contador++;
                              }
                            }
                        pg_close($con);  
                        ?>">-</option>";
                    </select>
                </td>
            </tr>
        </tbody>
    </table> 
    </div>
              </div><br>  
              <div class="form-group">
                <label for="tel_fijo" class="col-sm-4 control-label">TELÉFONO FIJO:</label>
                <div class="col-sm-8">
                  
                    <?php
                        require_once('conexion.php');
                        $conexion = new Conexion();
                        $con = $conexion->conectar();
                        if(!$con )
                        {
                            echo "Error de conexión con base de datos";
                        }
                        else{
                            $id_doc = "";
                             $id_usuario = pg_query($con,"SELECT cod_doc FROM docente d WHERE d.nomb_doc = '$nomUsuario';");
                             while($aux = pg_fetch_array($id_usuario)){
                             $id_doc= $aux[0];
                                }
                            
                            $resultado = pg_query($con,"select tel_doc
                                                        from docente
                                                    where cod_doc = '$id_doc';");
                            while($dato = pg_fetch_array($resultado)){
                                if(($num_tel = $dato[0]) == ""){
                                    echo "<input type='tel' class='form-control' id='tel_fijo' placeholder='Ingrese tel...'>";
                                }
                                else{
                                echo "<input type='tel' class='form-control' id='tel_fijo' value='$num_tel'>";
                                }
                              }
                            }
                        pg_close($con);  
                        ?> 
                </div>
              </div><br>
            <div class="form-group">
                <label for="tel_cel" class="col-sm-4 control-label">TELÉFONO CELULAR:</label>
                <div class="col-sm-8">
                  
                    <?php
                        require_once('conexion.php');
                        $conexion = new Conexion();
                        $con = $conexion->conectar();
                        if(!$con )
                        {
                            echo "Error de conexión con base de datos";
                        }
                        else{
                            $resultado = pg_query($con,"select cel_doc
                                                        from docente
                                                    where cod_doc = '$id_doc';");
                            while($dato = pg_fetch_array($resultado)){
                                if(($num_cel = $dato[0]) == ""){
                                    echo "<input type='tel' class='form-control' id='tel_cel' placeholder='Ingrese cel...'>";
                                }
                                else{
                                echo "<input type='tel' class='form-control' id='tel_cel' value='$num_cel'>";
                                }
                              }
                            }
                        pg_close($con);  
                        ?> 
                </div>
              </div><br>
            <div class="form-group">
                <label for="tel_cel" class="col-sm-4 control-label">CORREO ELECTRÓNICO:</label>
                <div class="col-sm-8">
                    <?php
                        require_once('conexion.php');
                        $conexion = new Conexion();
                        $con = $conexion->conectar();
                        if(!$con )
                        {
                            echo "Error de conexión con base de datos";
                        }
                        else{
                            $resultado = pg_query($con,"select email_doc
                                                        from docente
                                                    where cod_doc = '$id_doc';");
                            while($dato = pg_fetch_array($resultado)){
                                if(($email = $dato[0]) == ""){
                                    echo "<input type='email' class='form-control' id='tel_cel' placeholder='Ingrese cel...'>";
                                }
                                else{
                                echo "<input type='email' class='form-control' id='tel_cel' value='$email'>";
                                }
                              }
                            }
                        pg_close($con);  
                        ?> 
                </div>
              </div><br>
    </div>
</div>
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
    function marcar_seleccionado(){
        obj1=document.getElementById('sel_2');
    for (i=0; i<obj1.options.length; i++){
        if(obj1.options[i].value!='-')
            obj1.options[i].selected=true;
        else
            obj1.options[i].selected=false;		
    }
  }
}

</script>

