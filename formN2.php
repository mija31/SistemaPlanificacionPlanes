<div class="panel panel-primary">
        <div class="panel-heading">II. JUSTIFICACIÓN</div>
        <div class="panel-body">
        <textarea id="justificacion2" class="form-control" rows="10" type='text' name='justificacion2'></textarea>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">III. OBJETIVOS</div>
        <div class="panel-body">
            <label class="control-label">El  estudiante al terminar el semestre o gestión será capaz de:</label><br>
            <label class="control-label">numere los objetivos Ejm: 1.-:</label><br>
            
            
                <div class="panel-body">
                    <textarea id="objText" class="form-control" rows="10" name="objetivo" type="text" ></textarea>
                </div>
            
        </div>
    </div>
  <div class="panel panel-primary">
        <div class="panel-heading">IV. SELECCIÓN Y ORGANIZACIÓN DE CONTENIDOS</div>
             
      <div class="panel-body" id="unidad" >
            <div class="panel panel-default" id="div1">
                <div class="panel-heading">UNIDAD 1:</div>
                <div class="panel-body">
                     <label class="control-label">NOMBRE DE LA UNIDAD: </label><br>
                     <input id="unidad1" type="text" class="form-control" placeholder="Nombre de unidad..." name="nombreUnidad[]">
                      
                     
                     
                    <label class="control-label">OBJETIVO DE LA UNIDAD:</label><br>
                    <label class="control-label">Al final de la unidad, el estudiante será capaz de:</label><br>
                     <textarea id="objetivo1" class="form-control" rows="10" type="text" name="objetivoUnidad[]"></textarea>
                    <label class="control-label">CONTENIDO:</label><br>
                     <textarea id="contenido1" class="form-control" rows="10" type="text" name="contenido[]"></textarea>
                </div>
            </div>
        
       </div>
            <div id="botones" class="row row-centered">
            <input type="button" id="btAd" value="Añadir Unidad" class="bt btn btn-danger" />
            <input type="button" id="btRemove" value="Eliminar Unidad" class="bt btn btn-danger" />
            </div><br>
      
</div>
<div class="panel panel-primary">
        <div class="panel-heading">V. METODOLOGÍAS.</div>
        <div class="panel-body">
           <textarea id="metodologia2" class="form-control" rows="10" type='text' name='metodologia2'></textarea>        
    </div>
</div>
<div class="panel panel-primary">
        <div class="panel-heading">VI. CRONOGRAMA O DURACIÓN EN PERIODOS ACADÉMICOS POR UNIDAD.</div>
        <div class="panel-body">
        <div class="table-responsive panel panel-default">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>UNIDAD</th>
                        <th>DURACIÓN HS. ACADÉMICAS</th>
                        <th>DURACIÓN SEMANAS</th>
                    </tr>
                </thead>
                   
                <tbody id="tablaUnidad">
                     <tr id="tablaUnidad1">
                        <td><input id="nomUnidad1" type="text" class="form-control" name="nomUnidad[]"></td>
                        <td><input id="durHsUnidad1" type="number" class="form-control" name="durHsUnidad[]"></td>
                        <td><input id="durSemUnidad1" type="number" class="form-control" name="durSemUnidad[]"></td>
                    </tr>
                </tbody>
            </table>
        </div>        
    </div>
</div>
<div class="panel panel-primary">
        <div class="panel-heading">VII. CRITERIOS DE EVALUACIÓN.</div>
        <div class="panel-body">
           <textarea id="criterios2" class="form-control" rows="10" type='text' name="criterios2"></textarea>        
    </div>
</div>
<div class="panel panel-primary">
        <div class="panel-heading">VIII. BIBLIOGRAFÍA.</div>
        <div class="panel-body">
           <textarea id="bilbiografia2" class="form-control" rows="10" type='text' name="bibliografia2"></textarea>        
    </div>
</div>


<script type="text/javascript">
   $(document).ready(function() {
var iCnt = 1;
var container = $(document.getElementById("unidad"));
var containerTabla = $(document.getElementById("tablaUnidad"));   
$('#btAd').click(function() {
if (iCnt <= 19) {
 
    iCnt = iCnt + 1;
    // Añadir caja de texto.
   // $(container).append('<input type=text class="input" id=tb' + iCnt + ' ' +
    //'value="Elemento de Texto ' + iCnt + '" />');
  $(container).append('<div class="panel panel-default" id="div'+iCnt+'">'+
                '<div class="panel-heading">UNIDAD '+iCnt+':</div>'+
                '<div class="panel-body">'+
                     '<label class="control-label">NOMBRE DE LA UNIDAD: </label><br>'+
                     '<input id="unidad'+iCnt+'" type="text" class="form-control" placeholder="Nombre de unidad..." name="nombreUnidad[]">'+
                    '<label class="control-label">OBJETIVO DE LA UNIDAD:</label><br>'+
                    '<label class="control-label">Al final de la unidad, el estudiante será capaz de:</label><br>'+
                     '<textarea id="objetivo'+iCnt+'" class="form-control" rows="10" type="text" name="objetivoUnidad[]"></textarea>'+
                    '<label class="control-label">CONTENIDO:</label><br>'+
                     '<textarea id="contenido'+iCnt+'" class="form-control" rows="10" type="text" name="contenido[]"></textarea>'+
                '</div>'+
            '</div>');
    $('#unidad').before(container);
    
    $(containerTabla).append('<tr id="tablaUnidad'+iCnt+'">'+
                        '<td><input id="nomUnidad'+iCnt+'" type="text" class="form-control" name="nomUnidad[]"></td>'+
                        '<td><input id="durHsUnidad'+iCnt+'" type="number" class="form-control" name="durHsUnidad[]"></td>'+
                        '<td><input id="durSemUnidad'+iCnt+'" type="number" class="form-control" name="durSemUnidad[]"></td>'+
                    '</tr>');
     $('#tablaUnidad').before(containerTabla);
    }
    else { //se establece un limite para añadir elementos, 20 es el limite

         Messenger().post({
                          message: "Llegó al maximo..",
                          hideAfter: 2,
                          hideOnNavigate: true
                        });

        }
});
 
$('#btRemove').click(function() { // Elimina un elemento por click
if (iCnt > 1) {
    $('#div' + iCnt).remove();
     $('#tablaUnidad' + iCnt).remove();
    iCnt = iCnt - 1; 
}
 else{
    if (iCnt == 1) { 
        
          Messenger().post({
                          message: "No puede eliminar más..",
                          hideAfter: 2,
                          hideOnNavigate: true
                        });

    }}
});
});
 
</script>