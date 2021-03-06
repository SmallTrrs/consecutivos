<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Areas</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/js/DataTables/datatables.min.css'); ?>">
</head>

<body>
    <?php $session = $this->session; ?>
    <?php  $this->load->view('base/menu-admin'); ?>

    <div class="container text-right">
        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-3 ml-3  p-1">
                Documentos / Edicion
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-7 p-3 bg-light border rounded-lg">


                <?php if ( $documento === null ) : ?>

                <div class="alert alert-danger text-center mt-3" role="alert">
                    DOCUMENTO NO ENCONTRADO
                </div>

                <?php else : ?>

                <div class="row">

                    <div class="col-md-10 bg-white m-4 border rounded p-3">
                        <div class="row ml-3">

                            <div class="col-md-9 alert alert-primary font-weight-light rounded-sm p-1 pl-2">
                                Campos Obligatorios ( * )
                            </div>

                        </div>


                        <!-- formulario  -->
                        <?php  $hidden = ['iddocumento' => $documento->iddocumento]; ?>
                        <?= form_open( 'documentos/update_db','', $hidden ); ?>

                        <!-- campo descripcion  -->
                        <div class="row pl-3">

                            <div class="col-md-9">

                                <div class="form-group">
                                    <label for="descripcion">* Nombre del Documento:</label>
                                    <input type="text" class="form-control" name="descripcion" maxlength="50"
                                        id="descripcion"
                                        value="<?= $session->flashdata('descripcion') === null ? $documento->descripcion : $session->flashdata('descripcion'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_descripcion'); ?></span>
                                </div>

                            </div>

                        </div>
                        <!-- fin campo descripcion  -->

                        <!-- botones  -->
                        <div class="row pl-3 my-2">
                            <div class="col-md-10 ">
                                <button type="submit" class="btn btn-sm btn-dark px-3"> <i class="fa fa-save pr-2"></i>
                                    Actualizar</button>
                                <a href="<?=base_url('documentos');?>" class="btn btn-sm btn-primary px-3 ml-3"> <i
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

    <?=  $session->flashdata('notificacion'); ?>

</body>

</html>