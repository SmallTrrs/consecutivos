
( function(){

    // Variables Globales
    var consecutivo = null;

    function validarConsecutivo(){

          var asunto       =  $('#asunto').val();
          var remitente    =  $('#remitente').val();
          var destinatario =  $('#destinatario').val();
          var referencia   =  $('#referencia').val();
          var area         =  $('#area').val();
          var documento    =  $('#documento').val();
         
         
          $('#err_asunto').html('');
          $('#err_remitente').html('');
          $('#err_destinatario').html('');
          $('#err_referencia').html('');
          $('#err_area').html('');
          $('#err_documento').html('');


          if ( asunto === '' || asunto === null ){
             
              $('#err_asunto').html('El campo asunto es requerido');
              $('#asunto').focus();   

             return false;
          }

          if ( remitente === '' || remitente === null ){
             
              $('#err_remitente').html('El campo remitente es requerido');
              $('#remitente').focus();   

             return false;
          }

          if ( destinatario === '' || destinatario === null ){
             
              $('#err_destinatario').html('El campo destinatario es requerido');
              $('#destinatario').focus();   

             return false;
          }

          if ( area === '0' ){
             
              $('#err_area').html('El campo area es requerido');
              
              return false;
          }

          if ( documento === '0' ){
             
              $('#err_documento').html('El campo documento es requerido');
              
              return false;
          }

         consecutivo = { 
               'asunto' : asunto,
               'remitente' : remitente,
               'destinatario' : destinatario,
               'referencia' : referencia,
               'area' : area,
               'documento' : documento
          } 

        return true;  

    }// fin validarConsecutivo
    
     function generarConsecutivo(){

        if ( validarConsecutivo() === true ){

            $.ajax({
                type: "post",
                url: base_url + "consecutivos/generarConsecutivo",
                data: consecutivo,                  
                success: function ( res ) {
                    
                     var res = JSON.parse( res );

                     if ( res.status === 'true' ){

                         $('.consecutivo').html(' # ' + res.numero);
                         edicion( res.id );
                         swal('Consecutivo Generado', '','success',{buttons: "Aceptar"});
                     }else{
                        swal('Error !!', 'Ocurrio un problema intenta nuevamente','error',{buttons: "Aceptar"});
                     }
                
                }
            });

        }

     }// fin generarNuevo

     function updateConsecutivo( id ){

         if ( validarConsecutivo() ){

             consecutivo.id = id;

              $.ajax({
                  type: "post",
                  url: base_url + "consecutivos/update_ajax",
                  data: consecutivo,                  
                  success: function ( res ) {
                      
                       res = JSON.parse( res );

                         if ( res.status === 'true')
                            swal('Consecutivo Actualizado', '','success',{buttons: "Aceptar"});
                         else
                            swal('Error !!', 'Ocurrio un problema intenta nuevamente','error', {buttons: "Aceptar"});
                         
                  }
              });
         }

     } // fin updateConsecutivo

    function edicion( id ){

        $('#generar').removeClass('btn-info')
                    .addClass('btn-dark')
                    .data('id', id)
                    .html('<i class="fa fa-save"></i> Actualizar');

        $('#nuevo').prop('disabled', false );
        $('#documento').prop('disabled' , true);

         consecutivo = null;           

    } // fin edicion


    function nuevoConsecutivo(){

        $('#asunto').val('').focus();
        $('#remitente').val('');
        $('#destinatario').val('');
        $('#referencia').val('');
        $('#area').val('0');
        $('#documento').val('0')
                       .prop('disabled', false);
        $('#generar').removeClass('btn-dark')
                     .addClass('btn-info')
                     .data('id', null)
                     .html('<i class="fa fa-cogs"></i> Generar Consecutivo ');               
        $('#nuevo').prop('disabled' , true );
        $('.consecutivo').html('# - - -');    

    }

     $('#generar').on('click', function () {         
         
          if ( $(this).data('id') === null  )              
              generarConsecutivo(); 
           else
              updateConsecutivo( $(this).data('id'));

     }); // fin click generar

     $('#nuevo').on('click', function () {      
         nuevoConsecutivo();
     }); // fin click nuevo

     $(document).ready(function () {                 
        
        if ( ss_activa === 'false' )
                  verificarToken();
            
         nuevoConsecutivo();
     });


})();

