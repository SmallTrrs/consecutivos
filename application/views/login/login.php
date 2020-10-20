<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Login</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/css/login.css')?>">

</head>

<body>
   <?php $session = $this->session; ?>
    <div class="d-flex justify-content-center mt-5">
      
         
        <div class="form-login shadow">

            <!-- fondo login  -->
            <div class="w-100 image-login">

                <div class="text-white form-title">L o g i n</div>

             </div>
            <!-- fin fondo login  -->        


            <?=  form_open('login/acceso', ['id' => 'frmLogin']); ?>

            <div class="w-100 p-5">

              
                 <!-- input usuario  -->                 
                <div class="form-group row">
                    <label for="usuario" class="col-sm-2">Usuario:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-sm" name="usuario" autocomplete="off" value="<?= $session->flashdata('usuario') === null ? '' : $session->flashdata('usuario'); ?>">
                        <small class="form-text text-danger"><?= $session->flashdata('err_usuario') ? $session->flashdata('err_usuario') : ''; ?></small>
                    </div>
                </div>
                <!-- fin input usuario  -->              


                 <!-- input password  -->                   
                <div class="form-group row">
                    <label for="password" class="col-sm-2">Password:</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control form-control-sm" name="password" value="<?= $session->flashdata('password') === null ? '' : $session->flashdata('password'); ?>">
                        <small class="form-text text-danger"><?= $session->flashdata('err_password') ? $session->flashdata('err_password') : ''; ?></small>
                    </div>
                </div>
                <!-- fin input password  -->  

                <!-- buttons  -->                
                <div class="form-group row mt-4">
                   
                      <div class="offset-md-2 col-md-3">
                      
                      <button type="submit" class="btn btn-sm btn-login btn-dark pl-2"><i class="fa fa-sign-in"></i> Entrar </button>
                      </div>
                      <button type="button" class="btn btn-sm btn-login btn-danger pl-2"><i class="fa fa-times"></i> Cancelar </button>
                     
                </div>
                <!-- fin buttons  -->  
                    
                <div class="row ">
                     <div class="col-md-12 text-right">
                     <a id="" class="btn btn-sm btn-secondary" href="<?=base_url('inicio');?>" role="button"> <i class="fa fa-home"></i> Pagina Principal</a>
                     </div>
                </div>

            </div>      

           <?=  form_close(); ?>          

            </div>
    </div>  


    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>
    
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>

    <?= $session->flashdata('notificacion'); ?>

</body>

</html>