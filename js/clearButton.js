$( document ).ready(function() {
  putItemsInFilter();
  $( ".views-exposed-widgets.clearfix input.form-submit" ).click(function() {
    console.log("refresacar scripts");
      putItemsInFilter();
  });
});

function putItemsInFilter() {
  console.log("entro funcion");
  $( ".form-item-title input" ).attr('placeholder', '(Ingrese nombre LO)');
  $( ".form-item-field-dba-value input" ).attr('placeholder', '(Ingrese DBA)');
  var $clearButton = '<a id="page-link" class="btn btn-success" href="http://aprende.colombiaaprende.edu.co/es/contenidoslo?title=&field_nivel_value=All&field_grado_tid=All&field_asignatura_tid=All&field_dba_value=">Ver todos</a>';
  $( 'div.views-exposed-widgets.clearfix' ).append ( $clearButton );
}


<script src="https://dl.dropboxusercontent.com/u/575652037/edu-pilotocpa/js/clearButton.js"></script>
