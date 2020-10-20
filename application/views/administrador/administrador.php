<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Administrador</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>
</head>

<body>

     <?php  $this->load->view('base/menu-admin'); ?>

   
    <!-- banner consecutiivos generados  -->
    <div class="container text-right">

        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-4 ml-3  p-1">
                CONSECUTIVOS GENERADOS
            </div>
        </div>
    </div>
   
    <!--  fin banner consecutiivos generados  -->

    <!-- numero de oonsecutivos generados  -->

    <div class="container">

        <div class="row">

             <?php foreach( $consecutivos as $consecutivo ): ?>

                 <?php if ( $consecutivo['numero'] > 0 ): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-img-top fnd-numero text-center pt-2"><?= $consecutivo['numero'] ?></div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase"><?= $consecutivo['documento'] ?></h5>
                            </div>
                        </div>
                    </div>
                 <?php endif; ?>  

             <?php endforeach;?>
           
        </div>

    </div>
    <!--  fin numero de oonsecutivos generados  -->


    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>
   
</body>

</html>