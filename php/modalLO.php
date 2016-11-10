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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

$( document ).ready(function() {
    var loContentTitle = $( "div.views-field.views-field-title .field-content" ).text();
    var contentUrl = $( "a#window-link" ).attr( 'href' );

    $( "div.modal-header .modal-title" ).html( loContentTitle );
    $( "iframe.lo-content" ).attr( "src", contentUrl );
    var $openContent= '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" onclick="setTimeout(function() {resizeIframes();}, 500)" >Ver contenido</button>';
    $( 'div.views-field.views-field-field-enlace-opcional div.field-content' ).append ( $openContent );
});

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
