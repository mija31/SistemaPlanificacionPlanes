<div class="panel panel-primary">
        <div class="panel-heading">I. IDENTIFICACIÓN</div>     
        
        <div class="panel-body">
            
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
