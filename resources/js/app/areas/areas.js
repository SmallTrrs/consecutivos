( function(){

    
   
    $(document).ready(function () {
      
       $('#tblAreas').DataTable({
        responsive: true,
        ordering:false,
        language:{url:base_url+"resources/js/DataTables/spanish.json"}
       });

       
      $('.eliminar').on('click', function(){

        swal({
            title: "Deseas Eliminar El Area ?",
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
               window.location = base_url + 'areas/delete/' + $(this).data('id') ;
              }

            });  // fin then confirmacion        

    });

    });



})();