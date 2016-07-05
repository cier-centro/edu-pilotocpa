<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://e0ac8878a7eddbffe6e3b036d9e75ee76d610c31.googledrive.com/host/0B29NQUZTblLrVWRaejZ5RTNXTmM">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<a id='page-link' target="_blank" class="btn btn-success btn-lg" > Búsqueda Avanzada LO</a>
<a id='window-link' target="_blank" class="btn btn-info btn-lg" >Abrir Página</a>

<script>
  var gradeArray = {"Primero": "G_1", "Segundo": "G_2", "Tercero": "G_3", "Cuarto": "G_4",  "Quinto": "G_5", "Sexto": "G_6", "Séptimo": "G_7", "Octavo": "G_8", "Noveno": "G_9", "Decimo": "G_10", "Once": "G_11"};
  var subjectArray = {"Lenguaje": "L", "Matemáticas": "M", "Ciencias": "S"};

  $( document ).ready(function() {
      var loContentTitle = (isWordInUrl('node'))? $( "div.title" ).text() : $( "div.views-field.views-field-title .field-content" ).text();
      var loContentGrade = (isWordInUrl('node'))? $( "div.field.field-name-field-grado" ).text() : $( "div.views-field.views-field-field-grado .field-content" ).text();
      var loContentGradeCode = getCode(loContentGrade, gradeArray);
      var loContentSubject = (isWordInUrl('node'))? $( "div.field.field-name-field-asignatura" ).text() : $( "div.views-field.views-field-field-asignatura .field-content" ).text();
      var loContentSubjectCode = getCode(loContentSubject, subjectArray);
      var loContentCode = (isWordInUrl('node'))? $( "div.field.field-name-field-codigo-lo .field-items" ).text() : $( "div.views-field.views-field-field-codigo-lo .field-content" ).text();
      var urlHost = 'http://contenidosparaaprender.mineducacion.gov.co/';
      var siteUrl = urlHost + loContentGradeCode + '/' + loContentSubjectCode + '/menu_' + loContentCode;
      console.log(loContentSubject + ' ' + loContentSubjectCode + ', ' + loContentGrade  + ' ' + loContentGradeCode + ', ' + loContentCode + ', url -> ' +siteUrl);
      var pageUrl = 'http://aprende.colombiaaprende.edu.co/es/contenidoslo';
      pageUrl = (isWordInUrl('/es'))? pageUrl : (isWordInUrl('/en'))? pageUrl.replace("/es", "/en") : pageUrl.replace("/es", "");
      $( "a#page-link" ).attr( "href", pageUrl );
      $( "a#window-link" ).attr( "href", siteUrl );
  });

  function getCode(comparingText, valuesArray ) {
     var code='No_found';
     Object.getOwnPropertyNames(valuesArray).forEach(function(val, idx, array) {
          code = (comparingText.includes(val))? valuesArray [val] : code;
      });
     return code;
  }

  function isWordInUrl(word) {
     return window.location.href.includes(word);
  }

</script>
