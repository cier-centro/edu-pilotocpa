<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://e0ac8878a7eddbffe6e3b036d9e75ee76d610c31.googledrive.com/host/0B29NQUZTblLrVWRaejZ5RTNXTmM">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="setTimeout(function() {resizeIframes();}, 500)" >Abrir contenido</button>
<a target="_blank" class="btn btn-success btn-lg" href='http://aprende.colombiaaprende.edu.co/es/contenidoslo'> Búsqueda Avanzada LO</a>
<a id='window-link' target="_blank" class="btn btn-info btn-lg" >Abrir Página</a>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <iframe class="lo-content" allowfullscreen="" frameborder="0" width="100%"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

var gradeArray = {"Primero": "G_1", "Segundo": "G_2", "Tercero": "G_3", "Cuarto": "G_4",  "Quinto": "G_5", "Sexto": "G_6", "Séptimo": "G_7", "Octavo": "G_8", "Noveno": "G_9", "Decimo": "G_10", "Once": "G_11"};
var subjectArray = {"Lenguaje": "L", "Matemáticas": "M", "Ciencias": "S"};

$( document ).ready(function() {
    var loContentTitle = (window.location.href.includes('node'))? $( "div.title" ).text() : $( "div.views-field.views-field-title .field-content" ).text();
    var loContentGrade = (window.location.href.includes('node'))? $( "div.field.field-name-field-grado" ).text() : $( "div.views-field.views-field-field-grado .field-content" ).text();
    var loContentGradeCode = getCode(loContentGrade, gradeArray);
    var loContentSubject = (window.location.href.includes('node'))? $( "div.field.field-name-field-asignatura" ).text() : $( "div.views-field.views-field-field-asignatura .field-content" ).text();
    var loContentSubjectCode = getCode(loContentSubject, subjectArray);
    var loContentCode = (window.location.href.includes('node'))? $( "div.field.field-name-field-codigo-lo .field-items" ).text() : $( "div.views-field.views-field-field-codigo-lo .field-content" ).text();
    var urlHost = 'http://contenidosparaaprender.mineducacion.gov.co/';
    var siteUrl = urlHost + loContentGradeCode + '/' + loContentSubjectCode + '/menu_' + loContentCode;
    console.log(loContentSubject + ' ' + loContentSubjectCode + ', ' + loContentGrade  + ' ' + loContentGradeCode + ', ' + loContentCode + ', url -> ' +siteUrl);
    $( "div.modal-header .modal-title" ).html( loContentTitle );
    $( "iframe.lo-content" ).attr( "src", siteUrl );
    $( "a#window-link" ).attr( "href", siteUrl );
});

function getCode(comparingText, valuesArray ) {
   var code='No_found';
   Object.getOwnPropertyNames(valuesArray).forEach(function(val, idx, array) {
        code = (comparingText.includes(val))? valuesArray [val] : code;
    });
   return code;
}

window.onresize = function(event) {
    resizeIframes();
}

function resizeIframes(){
if ((document.getElementsByClassName('lo-content')[0] != null) && (document.getElementsByClassName("lo-content").length > 0)) {
       for (var i = 0; i < document.getElementsByClassName("lo-content").length; i++) {
             resizeIframe(document.getElementsByClassName('lo-content')[i]);
       }
    }
}

function resizeIframe(object) {
 object.style.height = (object.clientWidth * 9 / 16) + "px";
}
</script>
