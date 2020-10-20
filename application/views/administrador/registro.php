<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Registro</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/css/login.css')?>">

</head>

<body>

   <?php  $session = $this->session; ?>

    <div class="d-flex justify-content-center mt-4">


        <div class="form-login shadow">

            <!-- fondo login  -->
            <div class="w-100 image-registro">

                <div class="text-white form-title">Registro Administrador</div>

            </div>
            <!-- fin fondo login  -->


            <?=  form_open('administrador/registroAdmin', ['id' => 'frmAdministrador']); ?>

            <div class="w-100 p-5">


                <!-- input usuario  -->
                <div class="form-group">

                    <div class="col-md-10">
                        <label for="nombre" class="text-dark">Nombre del Administrador:</label>
                        <input type="text" class="form-control form-control-sm" name="nombre" autocomplete="off" value="<?= $session->flashdata('nombre') === null ? '' : $session->flashdata('nombre'); ?>">
                        <small class="form-text text-danger"><?= $session->flashdata('err_nombre') ? $session->flashdata('err_nombre') : ''; ?></small>
                    </div>

                </div>
                <!-- fin input usuario  -->

                <!-- input password  -->
                <div class="form-group">
                   
                    <div class="col-md-8">
                    <label for="password">Password:</label>
                        <input type="password" class="form-control form-control-sm" name="password" autocomplete="off" value="<?= $session->flashdata('password') === null ? '' : $session->flashdata('password'); ?>">
                        <small class="form-text text-danger"><?= $session->flashdata('err_password') ? $session->flashdata('err_password') : ''; ?></small>
                    </div> 
                </div>
                <!-- fin input password  -->

                 <!-- input password  -->
                 <div class="form-group">
                   
                   <div class="col-md-8">
                   <label for="password">Confirma el Password:</label>
                       <input type="password" class="form-control form-control-sm" name="passconf" autocomplete="off" value="<?= $session->flashdata('passconf') === null ? '' : $session->flashdata('passconf'); ?>">
                       <small class="form-text text-danger"><?= $session->flashdata('err_passconf') ? $session->flashdata('err_passconf') : ''; ?></small>
                   </div>
               </div>
               <!-- fin input password  -->

                <!-- buttons  -->
                <div class="form-group row mt-4">

                    <div class="offset-md-2 col-md-3">

                        <button type="submit" class="btn btn-sm btn-login btn-dark pl-2"><i class="fa fa-address-book-o"></i> Registrar </button>
                    </div>
                    <button type="button" class="btn btn-sm btn-login btn-danger pl-2"><i class="fa fa-times"></i> Cancelar </button>

                </div>
                <!-- fin buttons  -->

                <small class="form-text text-muted">* El usuario administrador aun no existe en el sistema</small>

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



</body>

</html>