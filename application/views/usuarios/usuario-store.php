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
                Usuarios / Nuevo
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-7 bg-light border rounded-lg">


                <div class="row">

                    <div class="col-md-10 bg-white m-4 border rounded p-3">


                        <div class="row ml-3">

                            <div class="col-md-9 alert alert-primary font-weight-light rounded-sm p-1 pl-2">
                                Campos Obligatorios ( * )
                            </div>

                        </div>

                        <!-- formulario  -->
                        <?= form_open('usuarios/store_db'); ?>

                        <!-- campo descripcion  -->
                        <div class="row pl-3">

                            <div class="col-md-9">

                                <!-- campo nombre  -->
                                <div class="form-group">
                                    <label for="nombre">* Nombre del Usuario:</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre" maxlength="80"
                                        id="nombre"
                                        value="<?= $session->flashdata('nombre') === null ? '' : $session->flashdata('nombre'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_nombre'); ?></span>
                                </div>
                                <!-- fin campo nombre  -->

                                <!-- campo usuario  -->
                                <div class="form-group">
                                    <label for="descripcion">* Usuario:</label>
                                    <input type="text" class="form-control form-control-sm" name="usuario"
                                        maxlength="15" id="usuario"
                                        value="<?= $session->flashdata('usuario') === null ? '' : $session->flashdata('usuario'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_usuario'); ?></span>
                                </div>
                                <!-- fin campo usuario  -->

                                <!-- campo password  -->
                                <div class="form-group">
                                    <label for="password">* Password:</label>
                                    <input type="password" class="form-control form-control-sm" name="password"
                                        maxlength="15" id="password"
                                        value="<?= $session->flashdata('password') === null ? '' : $session->flashdata('password'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_password'); ?></span>
                                </div>
                                <!-- fin campo usuario  -->

                                <!-- campo confirma password  -->
                                <div class="form-group">
                                    <label for="passconf">* Confirmar Password:</label>
                                    <input type="password" class="form-control form-control-sm" name="passconf"
                                        maxlength="15" id="passconf"
                                        value="<?= $session->flashdata('passconf') === null ? '' : $session->flashdata('passconf'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_passconf'); ?></span>
                                </div>
                                <!-- fin campo usuario  -->

                                <!-- campo activo  -->
                                <div class="form-group">
                                    <label for="activo">* Estado: </label>
                                    <select name="activo" id="activo" class="custom-select custom-select-sm">
                                        <?php if ( $session->flashdata('activo') === null ) : ?>
                                        <option value="1">Habilitado</option>
                                        <option value="0">Inhabilitado</option>

                                        <?php else: ?>

                                        <?php if ( $session->flashdata('activo')  === '1' ) : ?>
                                        <option value="1" selected>Habilitado</option>
                                        <option value="0">Inhabilitado</option>
                                        <?php else: ?>
                                        <option value="1">Habilitado</option>
                                        <option value="0" selected>Inhabilitado</option>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <!-- fin campo activo -->

                            </div>

                        </div>
                        <!-- fin campo descripcion  -->

                        <!-- botones  -->
                        <div class="row pl-3 my-2">
                            <div class="col-md-10 ">
                                <button type="submit" class="btn btn-sm btn-dark px-3"> <i class="fa fa-save pr-2"></i>
                                    Guardar</button>
                                <button type="button" class="btn btn-sm btn-danger px-3 ml-3" id="cancelar"> <i
                                        class="fa fa-times pr-2"></i>
                                    Cancelar</button>
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

            </div>
        </div>

    </div>

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>

    <script src="<?= base_url('resources/js/app/usuarios/usuario-store.js')?>"></script>

    <?=  $session->flashdata('notificacion'); ?>

</body>

</html>