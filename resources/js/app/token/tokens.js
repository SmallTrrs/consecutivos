( function(){

    $(document).ready(function () {
      
       $('#tblTokens').DataTable({
        responsive: true,
        ordering:false,
        language:{url:base_url+"resources/js/DataTables/spanish.json"}
       });
        
    });

})();