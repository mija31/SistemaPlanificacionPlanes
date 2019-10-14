   
<form enctype="multipart/form-data">
        <input class="form-control" id="file-es" name="file-es[]" type="file" multiple>
</form>
           <br>
<!--Encabezado de la pagina-->
           <div class="panel panel-primary">
               <div class="panel-heading"> ENCABEZADO DE PÁGINA</div>
               <div class="panel-body">
               <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                        <th> Alineacion Texto</th>
                        <th> Texto</th>  
                        <th> Color Texto</th>
                     </tr>
                   </thead>
                   <tbody>
                   <tr>
                        <td>Texto Izquierda</td>
                       <td><input type="text" class="form-control"></td>
                       <td><input type="color"></input></td>
                   </tr>
                   <tr>
                        <td>Texto Centro</td>
                       <td><input type="text" class="form-control"></td>
                        <td><input type="color"></input></td>
                   </tr>
                   <tr>
                        <td>Texto Derecha</td>
                       <td><input type="text" class="form-control"></td>
                        <td><input type="color"></input></td>
                   </tr>
                </tbody>
               </table>
              </div>
          </div>
        </div>
<!--Opcion de insertar Linea-->
        <div class="panel panel-primary">
            <div class="panel-heading"> LINEA ENCABEZADO Y PIE DE PÁGINA</div>
            <div class="panel-body">
                <div class="select">
                    <div class="form-group">
                      <label for="sel1">Seleccione opcion:</label>
                      <select class="form-control" id="sel1">
                        <option>Nimguno</option>
                        <option>Encabezado</option>
                        <option>Pie de Pagina</option>
                        <option>Encabezado y pie de Página</option>
                      </select>
                    </div>
                </div>
            <label>Seleccione color de linea:</label><br>
              <input type="color" ></input>
            </div>
        </div>
<!--PIE de pagina-->
<div class="panel panel-primary">
               <div class="panel-heading"> PIE DE PÁGINA</div>
               <div class="panel-body">
               <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                        <th> Alineacion Texto</th>
                        <th> Texto</th>  
                        <th> Color Texto</th>
                     </tr>
                   </thead>
                   <tbody>
                   <tr>
                        <td>Texto Izquierda</td>
                       <td><input type="text" class="form-control"></td>
                       <td><input type="color"></input></td>
                   </tr>
                   <tr>
                        <td>Texto Centro</td>
                       <td><input type="text" class="form-control"></td>
                        <td><input type="color"></input></td>
                   </tr>
                   <tr>
                        <td>Texto Derecha</td>
                       <td><input type="text" class="form-control"></td>
                        <td><input type="color"></input></td>
                   </tr>
                </tbody>
               </table>
              </div>
          </div>
        </div>
        <div class="row row-centered">
           <button id="opcional_guardar" type="submit" class="btn btn-danger">Guardar</button> 
           <button id="opcional_cancelar" type="submit" class="btn btn-danger">Cancelar</button>
        </div>
	<script>
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions : ['jpg', 'png','gif'],
    });
   
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
    });
	</script>