( function(){

     // Variables globales
     var consecutivos = null;

   
     function validarForm(){

      var documento = $('#documento').val();
      var anio      = $('#anio').val();

      $('#err_documento').html('');
      $('#err_anio').html('');
 

      if ( documento === '0' ){
          $('#err_documento').html('Selecciona un documento');
          return false;
      }
         
      if ( anio === '0' ){
          $('#err_anio').html('Selecciona un año');
          return false;
      }

      consecutivos = {
          documento : documento,
          anio: anio
      }
         
      return true;

     }// fin validarForm


      

     function buscarConsecutivos(){

        $('#tblConsecutivos').DataTable({
             destroy: true,
             ajax:{
                type: "post",
                url: base_url + "consultas/lista",
                data: consecutivos,
                dataType: "json"
             },             
             columns:[

                  { data: 'numero' },
                  { data: 'asunto' },
                  { data: 'destinatario' },
                  { data: 'fecha' },
                  { data: 'acciones' },
             ],
            
             columnDefs:[
                {
                    targets: 0,
                    className: 'dt-center'
                },
    
                
               { 
                targets: 4,
                className: 'dt-right'
              },
              
             
            ],
             lengthMenu:[50,100],
             responsive: true,
             ordering:false,
             language:{url:base_url+"resources/js/DataTables/spanish.json"}

        });

     }


     $('#buscar').on('click', function(){
         
        if ( validarForm() )
            buscarConsecutivos();

     });

      function detalleConsecutivo( id ){

          $.ajax({
              type: "post",
              url: base_url + "consecutivos/detalle",
              data: { id: id },
              dataType: "json",
              success: function ( res ) {
                  
                     $('#cn-numero').html( 'numero: ' + res.numero );
                     $('#cn-asunto').html( res.asunto );
                     $('#cn-remitente').html( res.remitente );
                     $('#cn-destinatario').html( res.destinatario );
                     $('#cn-referencia').html( res.referencia );
                     $('#cn-area').html( res.area );
                     $('#cn-documento').html( res.documento );
                     $('#cn-creado').html( res.creado );

                     $('#detalle').modal('show');
              }
          });

      }

     $('table').on('click', '.detalle' , function(){
          
            detalleConsecutivo( $(this).data('id'));

     });

     function inicio(){

        $('#tblConsecutivos').DataTable({
            lengthMenu:[50,100],            
            responsive: true,
            ordering:false,
            language:{url:base_url+"resources/js/DataTables/spanish.json"}
        });
        $('#documento').val('0');
        $('#anio').val('0');
     }

    $(document).ready(function () {

        if ( ss_activa === 'false')
               verificarToken();

        inicio();
        
    });

})();