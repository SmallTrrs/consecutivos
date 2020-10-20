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
                Consecutivos / Edicion
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-8 bg-light border rounded-lg">


                <?php if ( $consecutivo === null ) : ?>

                <div class="alert alert-danger text-center mt-3" role="alert">
                    CONSECUTIVO NO ENCONTRADO
                </div>

                <?php else : ?>

                <div class="row">

                    <div class="col-md-11 bg-white m-4 border rounded p-3">


                        <div class="row ml-3">

                            <div class="col-md-10 alert alert-primary font-weight-light rounded-sm p-1 pl-2">
                                Campos Obligatorios ( * )
                            </div>

                        </div>

                        <!-- formulario  -->
                        <?php $hidden = ['idconsecutivo' => $consecutivo->idconsecutivo] ; ?>
                        <?= form_open('consecutivos/update_db','', $hidden ); ?>

                        <!-- campo descripcion  -->
                        <div class="row pl-3">

                            <div class="col-md-10">

                                <!-- campo numero  -->
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="numero">Numero: </label>
                                        <input type="text" class="form-control text-center form-control-sm"
                                            value="<?= $consecutivo->numero ?>" autocomplete="off" readonly
                                            style="width: 200px;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="documento">Documento : </label>
                                        <input type="text" class="form-control text-center form-control-sm text-uppercase"
                                            value="<?= $consecutivo->documento ?>" autocomplete="off" readonly
                                            style="width: 200px;">
                                    </div>

                                </div>
                                <!-- fin campo nombre  -->

                                <!-- campo asunto  -->
                                <div class="form-group">
                                    <label for="asunto">* Asunto:</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="asunto"
                                        value="<?= $session->flashdata('asunto') === null ? $consecutivo->asunto : $session->flashdata('asunto'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_asunto'); ?></span>
                                </div>
                                <!-- fin campo asunto  -->

                                <!-- campo remitente  -->
                                <div class="form-group">
                                    <label for="remitente">* Remitente:</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="remitente"
                                        value="<?= $session->flashdata('remitente') === null ? $consecutivo->remitente : $session->flashdata('remitente'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_remitente'); ?></span>
                                </div>
                                <!-- fin campo remitente  -->

                                <!-- campo destinatario  -->
                                <div class="form-group">
                                    <label for="destinatario">* Destinatario:</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="destinatario"
                                        value="<?= $session->flashdata('destinatario') === null ? $consecutivo->destinatario : $session->flashdata('destinatario'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_destinatario'); ?></span>
                                </div>
                                <!-- fin campo destinatario  -->

                                <!-- campo referencia  -->
                                <div class="form-group">
                                    <label for="referencia">Referencia:</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="referencia"
                                        value="<?= $session->flashdata('referencia') === null ? $consecutivo->referencia : $session->flashdata('referencia'); ?>"
                                        autocomplete="off">
                                    <span class="text-danger"><?= $session->flashdata('err_referencia'); ?></span>
                                </div>
                                <!-- fin campo destinatario  -->

                                <!-- campo activo  -->
                                <div class="form-group">
                                    <label for="area">* Areas: </label>
                                    <select name="area" class="custom-select custom-select-sm">

                                        <?php 
                                            $idarea = $session->flashdata('area') === null ? : $consecutivo->idarea;

                                            foreach ($areas as $area): 

                                                if ( $area->idarea === $idarea ):
                                         ?>
                                        <option value="<?= $area->idarea ?>" selected><?= $area->descripcion ?></option>

                                        <?php else: ?>
                                        <option value="<?= $area->idarea ?>" selected><?= $area->descripcion ?></option>
                                        <?php endif; endforeach; ?>

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
                                    Actualizar</button>
                                <a href="<?=base_url('consultas');?>" class="btn btn-sm btn-primary px-3 ml-3"> <i
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