
    function verificarToken(){
   
        var token = localStorage.getItem('tkngc');
  
        if ( token === null ) 
               window.location.href = base_url + 'login';
        else{

            
            $.ajax({
                type: "post",
                url: base_url + "tokens/validar",
                data: { token: token },
                success: function (response) {
                         
                   if ( response === 'invalido' ){
                      window.location.href = base_url + 'login/invalido';
                   }
                }
            });
        }            
          
    } // fin verificarToken
