
    <div class="panel panel-primary">
        <div class="panel-heading">V. ESTRUCTURACIÓN EN UNIDADES DIDÁCTICAS Y SU DESCRIPCIÓN.</div>
        <div class="panel-body" id="unidadAntiguo">
            <div id="antiguo1">           
                <label for="nombre_unidad1" class="col-sm-4 control-label">NOMBRE DE UNIDAD (1):</label>
                  <div  class="col-sm-8">
                  <input name="nombre_unidad[]" type="text" class=" form-control" id="nombre_unidad1"  placeholder="Nombre de unidad...">
                </div>
              <div class="form-group">
                <label for="duracion_unidad1" class="col-sm-12 control-label">DURACIÓN DE LA UNIDAD EN PERIODOS ACADÉMICOS:</label>
                <div class="col-sm-12">
                  <input  id="duracion_unidad1" type="text" class="form-control" name="duracion_unidad[]" placeholder="Duración.....">
                </div>
              </div>
                <!--desde objetivos de unidad-->
            <label class="col-sm-12 control-label">OBJETIVOS DE LA UNIDAD:</label><br>
            <textarea id="obj1" class="form-control" rows="10" type="text" name="obj[]"></textarea>  
                <!--fin de objetvios de unidad-->
            <label class="control-label">CONTENIDO:</label><br>
            <textarea id="contenido1" class="form-control" rows="10" type="text" name="contenido[]"></textarea>
                <!--fin de contenido-->
           <label class="control-label">METODOLOGÍA DE ENSEÑANZA:</label><br>
        <div class="panel panel-default">
         <div class="panel-heading">TÉCNICAS PREDOMINANTES PROPUESTAS PARA LA UNIDAD:</div>
           <div class="panel-body">
             <textarea id="tecnicas1" class="form-control" rows="10" type="text" name="tecnicas[]"></textarea>
           </div>
        </div>
        <div class="panel panel-default">
         <div class="panel-heading">EVALUACIÓN DE LA UNIDAD:</div>
           <div class="panel-body">
            <textarea id="evaluacion2" class="form-control" rows="10" type="text" name="evaluacion[]"></textarea>
            </div>
        </div>
        <div class="panel panel-default">
         <div class="panel-heading">BIBLIOGRAFÍA ESPECIFICA DE LA UNIDAD:</div>
           <div class="panel-body">
            <textarea id="bibliografia1" class="form-control" rows="10" type="text" name="bibliografia[]"></textarea>
           </div>
        </div>
      </div>
            
    </div>
        <div id="botonesUnidad" class="row row-centered">
                <button id="botonPP" type="button" class="btn btn-warning">Añadir Unidad</button> 
               <button id="botonMM" type="button" class="btn btn-warning">EliminarUnidad</button>
        </div><br>
</div>

<script type="text/javascript">
   $(document).ready(function() {
var cantidad = 1;
var container = $(document.getElementById("unidadAntiguo"));
   
$('#botonPP').click(function() {
if (cantidad <= 19) {
 
    cantidad = cantidad + 1;
    // Añadir caja de texto.
   // $(container).append('<input type=text class="input" id=tb' + iCnt + ' ' +
    //'value="Elemento de Texto ' + iCnt + '" />');
  $(container).append(' <div id="antiguo'+cantidad+'">'+           
                '<label for="nombre_unidad'+cantidad+'" class="col-sm-4 control-label">NOMBRE DE UNIDAD ('+cantidad+'):</label>'+ 
                  '<div  class="col-sm-8">'+ 
                  '<input name="nombre_unidad[]" type="text" class=" form-control" id="nombre_unidad'+cantidad+'" placeholder="Nombre de unidad...">'+ 
                '</div>'+ 
              '<div class="form-group">'+ 
                '<label for="duracion_unidad'+cantidad+'" class="col-sm-12 control-label">DURACIÓN DE LA UNIDAD EN PERIODOS ACADÉMICOS:</label>'+ 
                '<div class="col-sm-12">'+ 
                  '<input  id="duracion_unidad'+cantidad+'" type="text" class="form-control" name="duracion_unidad[]" placeholder="Duración.....">'+ 
                '</div>'+ 
              '</div>'+ 
            '<label class="col-sm-12 control-label">OBJETIVOS DE LA UNIDAD:</label><br>'+ 
            '<textarea id="obj'+cantidad+'" class="form-control" rows="10" type="text" name="obj[]"></textarea>'+             
            '<label class="control-label">CONTENIDO:</label><br>'+ 
            '<textarea id="contenido'+cantidad+'" class="form-control" rows="10" type="text" name="contenido[]"></textarea>'+ 
           '<label class="control-label">METODOLOGÍA DE ENSEÑANZA:</label><br>'+ 
        '<div class="panel panel-default">'+
         '<div class="panel-heading">TÉCNICAS PREDOMINANTES PROPUESTAS PARA LA UNIDAD:</div>'+ 
           '<div class="panel-body">'+
             '<textarea id="tecnicas'+cantidad+'" class="form-control" rows="10" type="text" name="tecnicas[]"></textarea>'+ 
           '</div>'+ 
        '</div>'+ 
        '<div class="panel panel-default">'+ 
         '<div class="panel-heading">EVALUACIÓN DE LA UNIDAD:</div>'+ 
           '<div class="panel-body">'+ 
            '<textarea id="evaluacion'+cantidad+'" class="form-control" rows="10" type="text" name="evaluacion[]"></textarea>'+ 
            '</div>'+ 
        '</div>'+ 
        '<div class="panel panel-default">'+ 
         '<div class="panel-heading">BIBLIOGRAFÍA ESPECIFICA DE LA UNIDAD:</div>'+ 
           '<div class="panel-body">'+ 
            '<textarea id="bibliografia'+cantidad+'" class="form-control" rows="10" type="text" name="bibliografia[]"></textarea>'+ 
           '</div>'+ 
       '</div>'+ 
      '</div>');
        
    $('#unidadAntiguo').before(container);
    }
    else { //se establece un limite para añadir elementos, 20 es el limite

         Messenger().post({
                          message: "Llegó al maximo..",
                          hideAfter: 2,
                          hideOnNavigate: true
                        });

        }
});
 
$('#botonMM').click(function() { // Elimina un elemento por click
if (cantidad > 1) {
    $('#antiguo' + cantidad).remove();
    cantidad = cantidad - 1; 
}
 else{
    if (cantidad == 1) { 
        
          Messenger().post({
                          message: "No puede eliminar más..",
                          hideAfter: 2,
                          hideOnNavigate: true
                        });

    }}
});
});
 
</script>