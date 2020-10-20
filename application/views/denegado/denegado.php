<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Denegado</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>
</head>

<body>

<div class="container-fluid bg-white fixed-top shadow pt-2" style="height: 80px;">

      <div class="row justify-content-center font-weight-light" style="font-size: 40px;">
           <div> <i class="text-danger fa fa-exclamation-triangle"></i>  Acceso Denegado</div>      
      </div>

</div>

   
         <div class="container" style="margin-top:250px">         
            <div class="row justify-content-center ">
                <div class="col-md-5"> 
                  <span class="text-uppercase" style="font-size: 20px;">El acceso a esta pagina esta restringido</span>
                  
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