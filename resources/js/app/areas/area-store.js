( function(){

 $('#cancelar').on('click', function(){
    $('#descripcion').val('');
    $('#descripcion').focus();
 });
  

  $(document).ready(function () {
    $('#descripcion').focus();
  });

})();