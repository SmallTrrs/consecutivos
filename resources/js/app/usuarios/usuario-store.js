( function(){

   function inicio(){
      
       $('#nombre').val('').focus();
       $('#usuario').val('');
       $('#password').val('');
       $('#passconf').val('');
       $('#activo').val('1');

   } // fin inicio

     $('#cancelar').on('click', function () {
         inicio();
     });

   $(document).ready(function () {
       inicio();
   });


})();