( function(){

    
   
    $(document).ready(function () {
      
       $('#tblDocumentos').DataTable({
         responsive: true,
         ordering:false,
         language:{url:base_url+"resources/js/DataTables/spanish.json"}
       });

       
       $('.eliminar').on('click', function(){

        swal({
            title: "Deseas Eliminar El Documento ?",
            text: "Una vez Eliminado No Se Podra Recuperar",
            icon: 'warning',
            dangerMode: true,
            buttons: {
               cancel: 'Cancelar',
               confirm: 'Aceptar'               
            },         
            
          })
          .then((confirmacion) => {
            
            if (confirmacion) {
               window.location = base_url + 'documentos/delete/' + $(this).data('id') ;
              }

            });  // fin then confirmacion        

    });

    });



})();