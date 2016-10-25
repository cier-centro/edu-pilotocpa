<!--Linea de campo enlace en nodos Contenidos para aprender-->
<?php echo file_get_contents("http://52.37.84.217/edu-pilotocpa/php/automaticLink.php"); ?>

<!--Estilos y scripts de la página en general-->
<link href="http://aprende.colombiaaprende.edu.co/sites/all/themes/aprende/boot/bootstrap.min.js" rel="stylesheet" />
<link rel="stylesheet" href="http://52.37.84.217/edu-pilotocpa/css/condensed-fix.css" />
<link rel="stylesheet" href="http://52.37.84.217/edu-pilotocpa/css/contenidosLOStyle.css" />

<script src="http://aprende.colombiaaprende.edu.co/sites/all/themes/aprende/boot/jquery.min.js"></script>
<script src="http://aprende.colombiaaprende.edu.co/sites/all/themes/aprende/boot/bootstrap.min.css"></script>

<!--Scripts de la página de información-->
<?php echo file_get_contents("http://52.37.84.217/edu-pilotocpa/php/modalLO.php"); ?>

<!--Código de prueba no funcional-->
<script>
   /*
   $( '#lo-contents-page' ).on( 'click', '.views-exposed-widgets.clearfix input.form-submit', function () {
       console.log("entro funcion");
       $( ".form-item-title input" ).attr('placeholder', '(Ingrese nombre LO)');
       $( ".form-item-field-dba-value input" ).attr('placeholder', '(Ingrese DBA)');
       var $clearButton = '<a id="page-link" class="btn btn-success" href="http://aprende.colombiaaprende.edu.co/es/contenidoslo?title=&field_nivel_value=All&field_grado_tid=All&field_asignatura_tid=All&field_dba_value=">Ver todos</a>';
       $( 'div.views-exposed-widgets.clearfix' ).append ( $clearButton );
   } );
   */

   $(function(){

   $('.views-exposed-widgets.clearfix input.form-submit').click(function(e){
     e.preventDefault();
     var link = $(this);
     $('#lo-contents-page').load(link.attr('href'),function(responseText, textStatus, XMLHttpRequest){
     $('.views-exposed-widgets.clearfix input.form-submit').removeClass('active');
     link.addClass('active');
     $('.views-exposed-widgets.clearfix input.form-submit').click(function(e){
     e.preventDefault();

   console.log("entro funcion try");
       $( ".form-item-title input" ).attr('placeholder', '(Ingrese nombre LO)');
       $( ".form-item-field-dba-value input" ).attr('placeholder', '(Ingrese DBA)');
       var $clearButton = '<a id="page-link" class="btn btn-success" href="http://aprende.colombiaaprende.edu.co/es/contenidoslo?title=&field_nivel_value=All&field_grado_tid=All&field_asignatura_tid=All&field_dba_value=">Ver todos</a>';
       $( 'div.views-exposed-widgets.clearfix' ).append ( $clearButton );

     });
     });
   });


   $('.views-exposed-widgets.clearfix input.form-submit').click(function(e){
     e.preventDefault();

   console.log("entro funcion");
       $( ".form-item-title input" ).attr('placeholder', '(Ingrese nombre LO)');
       $( ".form-item-field-dba-value input" ).attr('placeholder', '(Ingrese DBA)');
       var $clearButton = '<a id="page-link" class="btn btn-success" href="http://aprende.colombiaaprende.edu.co/es/contenidoslo?title=&field_nivel_value=All&field_grado_tid=All&field_asignatura_tid=All&field_dba_value=">Ver todos</a>';
       $( 'div.views-exposed-widgets.clearfix' ).append ( $clearButton );

     });

   });




   $( document ).ready(function() {
     putItemsInFilter();
   /*  $( ".views-exposed-widgets.clearfix input.form-submit" ).click(function() {
       console.log("refresacar scripts");
         putItemsInFilter();
     });*/
   });

   function putItemsInFilter() {
     console.log("entro funcion");
     $( ".form-item-title input" ).attr('placeholder', '(Ingrese nombre LO)');
     $( ".form-item-field-dba-value input" ).attr('placeholder', '(Ingrese DBA)');
     var $clearButton = '<a id="page-link" class="btn btn-success" href="http://aprende.colombiaaprende.edu.co/es/contenidoslo?title=&field_nivel_value=All&field_grado_tid=All&field_asignatura_tid=All&field_dba_value=">Ver todos</a>';
     $( 'div.views-exposed-widgets.clearfix' ).append ( $clearButton );
   }
</script>
