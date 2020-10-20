<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Usuarios</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/js/DataTables/datatables.min.css'); ?>">
</head>

<body>
    <?php $session = $this->session; ?>
    <?php  $this->load->view('base/menu-admin'); ?>

    
    <div class="container text-right">
        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-3 ml-3  p-1">
                Usuarios / Cambio Password
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-7 p-3 bg-light border rounded-lg">

                <?php if ( $usuario === null ): ?>
                <div class="alert alert-danger text-center mt-3" role="alert">
                    USUARIO NO ENCONTRADO
                </div>

                <?php else: ?>

                <div class="row">

                    <div class="col-md-10 bg-white m-4 border rounded p-3">


                        <div class="row p-3 ml-1">

                            <div class="col-md-9 bg-purple font-weight-light rounded-sm p-1 pl-2">
                               * Campos Obligatorios
                            </div>

                        </div>



                        <!-- formulario  -->
                    <?php  $hidden = ['idusuario' => $usuario->idusuario] ?>  

                    <?= form_open('usuarios/password_db', '', $hidden ); ?>

                        <!-- campo descripcion  -->
                        <div class="row pl-3">

                            <div class="col-md-9">
                                                              

                                  <div class="mb-3 alert alert-primary p-2">                                  
                                    <span class="text-dark">Usuario: <?= $usuario->usuario; ?></span>                                  
                                  </div>                            

                                 <!-- campo password  -->                                 
                                 <div class="form-group">
                                    <label for="password">* Nuevo Password:</label>
                                    <input type="password" class="form-control form-control-sm" name="password" maxlength="15" id="password" value="<?= $session->flashdata('password') === null ? '' : $session->flashdata('password'); ?>" autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_password'); ?></span>
                                </div>
                               <!-- fin campo password  --> 

                                <!-- campo confirma password  -->                                 
                                <div class="form-group">
                                    <label for="passconf">* Confirmar Password:</label>
                                    <input type="password" class="form-control form-control-sm" name="passconf" maxlength="15" id="passconf" value="<?= $session->flashdata('passconf') === null ? '' : $session->flashdata('passconf'); ?>" autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_passconf'); ?></span>
                                </div>
                               <!-- fin campo usuario  --> 

                            </div>

                        </div>
                        <!-- fin campo descripcion  -->

                        <!-- botones  -->
                        <div class="row pl-3 my-2">
                            <div class="col-md-10 ">
                                <button type="submit" class="btn btn-sm btn-dark px-3"> <i class="fa fa-save pr-2"></i>
                                    Guardar</button>
                                    <a href="<?=base_url('usuarios');?>" class="btn btn-sm btn-primary px-3 ml-3"> <i
                                        class="fa fa-arrow-circle-left pr-2"></i>
                                    Regresar</a>
                            </div>

                        </div>
                        <!-- campo fin botones  -->

                        <?= form_close(); ?>
                        <!-- fin formulario  -->

                    </div>

                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>
    
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>

    <script src="<?= base_url('resources/js/app/areas/area-store.js')?>"></script>

    <?=  $session->flashdata('notificacion'); ?>

</body>

</html>