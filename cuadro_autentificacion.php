<div class="well boxaute" id="identificacion">
                  
 <?php
if(1==1)
	{
?>                       <h4>Identificarse <span class="label label-default">Usuario</span></h4>
                        	
                            <div class="form-bottom">
			                    <form role="form" name="autentificacion" action="validar_datos.php" method="POST" class="login-form">
			                    	<div class="form-group">
	
			                        	<input type="text" name="usuario" placeholder="Ingrese su usuario" class="form-username form-control" required>
			                        </div>
			                        <div class="form-group">
			                        	
			                        	<input type="password" name="password" placeholder="Ingrese su password." class="form-password form-control" id="form-password" required>
			                        </div>
									<?php
if(isset($_GET['errorAute']))
			{
				echo"<div class=\"alert alert-danger\" role=\"alert\">Error!! Intente de nuevo</div>";
			}
?>
									
			                        <button type="submit" name="validar" class="btn cuadrobotonAute"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Autentificarse</button>
			                    </form>
		                    </div>
							
							<?php
	}
	else{
		echo"<div class=\"alert alert-info\" role=\"alert\">Este servicio no esta disponible por el momento</div>";
	}
?>
                       
                </div>