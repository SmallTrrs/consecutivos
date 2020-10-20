<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>404</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>
</head>

<body>

<div class="container-fluid bg-white fixed-top shadow pt-2" style="height: 80px;">

      <div class="row justify-content-center font-weight-light">
           <div> 
             <span  class="text-blue-light mr-3" style="font-size: 35px;"><i class="fa fa-edge"></i> 404</span>  
             <span style="font-size:26px;"> PAGINA NO ENCONTRADA</span></div>      
      </div>

</div>

   
         <div class="container" style="margin-top:250px">         
            <div class="row justify-content-center ">
                <div class="col-md-5"> 
                  <span class="text-uppercase" style="font-size: 20px;">No se encontro el recurso solicitado</span>
                  
                </div>
            </div>
         </div>

         <div class="container mt-3">         
            <div class="row justify-content-center ">
                <div class="col-md-5 text-center"> 
                  <a href="<?= base_url('inicio') ?>" class="btn btn-dark"><i class="fa fa-home"></i> Pagina Principal</a>
                </div>
            </div>
         </div>


        


    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>
   
</body>

</html>