

    function verificarToken(){
   
        var token = localStorage.getItem('tkngc');
  
        if ( token === null ) 
            window.location.href = baseUrl + 'login';
          
    }
  
 
  