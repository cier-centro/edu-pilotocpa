<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://52.37.84.217/edu-pilotocpa/css/condensed-fix.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-pilotocpa/css/contenidosLOStyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="info-links">
    <a id='credits-link' target="_blank" class="btn btn-link" >Créditos</a>
    <a id='copyright-link' target="_blank" class="btn btn-link" >Derechos de Autor</a>
</div>
<a id='page-link' class="btn btn-warning" >Volver a buscar contenidos</a>
<a id='window-link' target="_blank" class="btn btn-warning" >Ver en página completa</a>

<script>
  var urlLOHost = 'http://aprende.colombiaaprende.edu.co/sites/default/files/naspublic/ContenidosAprender/';
  var pageHomeUrl = 'http://aprende.colombiaaprende.edu.co/es/contenidoslo';
  var creditsUrl = urlLOHost + 'creditos/index.html';
  var copyrightUrl = urlLOHost + 'derechos/index.html';

  var gradeArray = {"Primero": "G_1", "Segundo": "G_2", "Tercero": "G_3", "Cuarto": "G_4",  "Quinto": "G_5", "Sexto": "G_6", "Séptimo": "G_7", "Octavo": "G_8", "Noveno": "G_9", "Decimo": "G_10", "Once": "G_11"};
  var subjectArray = {"Lenguaje": "L", "Matemáticas": "M", "Ciencias": "S"};
  var colorArray = {"Lenguaje": "#C7716C", "Matemáticas": "#56B4C0", "Ciencias": "#78AC84"};

  var loContentSubjectElement = (isWordInUrl('node'))? $( "div.field.field-name-field-asignatura a" ) : $( "div.views-field.views-field-field-asignatura .field-content a" ) ;
  var downloadButton = '<a id="download-link" class="btn btn-warning" >Descargar contenido</a>';
  var downloadLabel = '<label id="download-msg" class="col-xs-12">Para descargar este contenido ingrese con su usuario y clave</label>';

  $( document ).ready(function() {
    setLOUrl($( "a#window-link" ));
    setColorBySubject(loContentSubjectElement);
    setHomeUrl($( "a#page-link" ));
    setUrl($( "a#credits-link" ), creditsUrl);
    setUrl($( "a#copyright-link" ), copyrightUrl);
    putExtraElements();
    hideButtonWhenLogout (getLOUrl( "a#download-link" ));
    setLOUrl($( "a#download-link" ));
  });

  function setLOUrl(loButton) {
    var siteUrl = getLOUrl(loButton.selector);
    loButton.attr( "href", siteUrl );
  }

  function getLOUrl(loButtonTag) {
    var loContentGrade = (isWordInUrl('node'))? $( "div.field.field-name-field-grado" ).text() : $( "div.views-field.views-field-field-grado .field-content" ).text();
    var loContentCode = (isWordInUrl('node'))? $( "div.field.field-name-field-codigo-lo .field-items" ).text() : $( "div.views-field.views-field-field-codigo-lo .field-content" ).text();
    return buildLOUrlFromStrings(loContentGrade, loContentSubjectElement.text(), loContentCode, loButtonTag);
  }

  function buildLOUrlFromStrings(grade, subject, code, buttonTag) {
    var gradeCode = getCode(grade, gradeArray);
    var subjectCode = getCode(subject, subjectArray);
    var url = urlLOHost + gradeCode + '/' + subjectCode + '/menu_' + code + '/index.html';
    var url2 = urlLOHost + "CPA_descargables/" + gradeCode + '/' + subjectCode + "/" + code + ".zip";
    //console.log(subject + ' ' + subjectCode + ', ' + grade  + ' ' + gradeCode + ', ' + code + ', url -> ' + url + ', url 2-> ' + url2);
    return (buttonTag == "a#window-link")? url : (buttonTag == "a#download-link")? url2 : "";
  }

  function getCode(comparingText, valuesArray ) {
    var code='No_found';
    Object.getOwnPropertyNames(valuesArray).forEach(function(val, idx, array) {
      code = (comparingText.includes(val))? valuesArray [val] : code;
    });
    return code;
  }

  function setColorBySubject(subjectLabel) {
    var colorLO = getCode(subjectLabel.text(), colorArray);
    colorLO = (colorLO == 'No_found')? '#6C91D7' : colorLO;
    $( subjectLabel ).css( "color", colorLO );
  }

  function setHomeUrl(homeButton) {
    pageHomeUrl = (isWordInUrl('/es'))? pageHomeUrl : (isWordInUrl('/en'))? pageHomeUrl.replace("/es", "/en") : pageHomeUrl.replace("/es", "");
    homeButton.attr( "href", pageHomeUrl );
  }

  function setUrl(button, url) {
    button.attr( "href", url );
  }

  function isWordInUrl(word) {
    return window.location.href.includes(word);
  }

  function putExtraElements() {
    $( "a#window-link" ).clone().insertBefore( $( ".modal-footer button" ) );
    var nodeBanner = '<img alt="" title="Default image" src="http://aprende.colombiaaprende.edu.co/sites/default/files/naspublic/banner_cpa.png" width="100%" height="auto">';
    $(nodeBanner).insertBefore( $( ".node-type-contenidos-lo .region-section-content" ) );
  }

  function hideButtonWhenLogout (buttonUrl) {
    var logoutButtonUrl = $( ".top_menu .logout a" ).attr( 'href' );
    if (isWordInLink(logoutButtonUrl, 'logout')) {
      $(downloadButton).insertBefore( $( "a#page-link" ) );
    }
    else {
      $(downloadLabel).insertBefore( $( "a#page-link" ) );
    }
  }

  function isWordInLink(url, word) {
    return (url!=null)? url.includes(word) : false;
  }

</script>
