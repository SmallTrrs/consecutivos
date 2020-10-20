( function(){

    function validarToken(){
    
     var equipo = $('#equipo').val();

      if (  equipo === '' || equipo === null ){

          $('#err_equipo').html('El campo equipo es requerido');
          $('#equipo').focus();
          return false;
      }
      
      return true;

    } // fin validarToken

    $('#delToken').on('click', function () {
        
        localStorage.removeItem('tkngc');

        swal('Token Removido', '', 'success' , {buttons: 'Aceptar'});

    });

    $(document).ready(function () {
         
        $('#frmToken').on('submit', function(e){
             e.preventDefault();
           
             if ( validarToken() )
                     this.submit();
                  
        });
    });

})();