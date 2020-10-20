<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Generacion de Consecutivos</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>
<script>
var ss_activa = "<?= $ss_activa ?>";
</script>
</head>

<body>

    <?php 
    
           if ( $this->session->userdata('ss-user') === null )
                $this->load->view('base/menu'); 
           else     
                $this->load->view('base/menu-admin'); 
    ?>


    <div class="container">

        <div class="row">

            <div class="offset-md-2 col-md-7 bg-white shadow rounded-sm border overflow-hidden mt-3">
                <!-- consecutivo  -->
                <div class="row">
                    <div class="col-md-12 text-white text-center consecutivo">
                        # - - -
                    </div>
                </div>
                <!-- fin consecutivo  -->

                <div class="row">
                    <div class="offset-md-1 col-md-9 mb-4">

                        <div class="text-muted mb-4 row border-secondary border-bottom font-weight-light p-2">Campos
                            Obligatorios ( * )
                        </div>
                        <!-- asunto  -->
                        <div class="form-group row">
                            <label for="asunto" class="col-md-3 col-form-label p-1 text-dark"><span
                                    class="text-muted">*</span> Asunto: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm" id="asunto" maxlength="200">
                                <span class="text-danger" id="err_asunto"></span>
                            </div>
                        </div>
                        <!-- fin asunto  -->

                        <!-- remitente  -->
                        <div class="form-group row">
                            <label for="remitente" class="col-md-3 col-form-label p-1 text-dark"><span
                                    class="text-muted">*</span> Remitente:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm" id="remitente" maxlength="80">
                                <span class="text-danger" id="err_remitente"></span>
                            </div>
                        </div>
                        <!-- fin remitente  -->

                        <!-- destinatario  -->
                        <div class="form-group row">
                            <label for="destinatario" class="col-md-3 col-form-label p-1 text-dark"><span
                                    class="text-muted">*</span> Destinatario:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm" id="destinatario"
                                    maxlength="80">
                                <span class="text-danger" id="err_destinatario"></span>
                            </div>
                        </div>
                        <!-- fin destinatario  -->

                        <!-- referencia  -->
                        <div class="form-group row">
                            <label for="referencia" class="col-md-3 col-form-label p-1 text-dark">Referencia:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm" id="referencia" maxlength="30">
                            </div>
                        </div>
                        <!-- fin referencia  -->

                        <!-- Areas  -->
                        <div class="form-group row">
                            <label for="area" class="col-md-3 col-form-label p-1 text-dark"><span
                                    class="text-muted">*</span> Area:</label>
                            <div class="col-md-9">
                                <select id="area" class="custom-select custom-select-sm">
                                    <option value="0">- - - - - - - - - - - - - - - - - - - - - -</option>
                                    <?php foreach( $areas as $area ): ?>
                                    <option value="<?= $area->idarea ?>"><?= $area->descripcion ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger" id="err_area"></span>
                            </div>
                        </div>
                        <!-- fin areas  -->

                        <!-- documento  -->
                        <div class="form-group row">
                            <label for="documento" class="col-md-3 col-form-label p-1 text-dark"><span
                                    class="text-muted">*</span> Documento:</label>
                            <div class="col-md-9">
                                <select id="documento" class="custom-select custom-select-sm">
                                    <option value="0"> - - - - - - - - - - - - - - - - - - - - -</option>
                                    <?php foreach( $documentos as $documento ): ?>
                                    <option value="<?= $documento->iddocumento ?>"><?= $documento->descripcion ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger" id="err_documento"></span>
                                </select>
                            </div>
                        </div>
                        <!-- fin documento  -->

                        <div class="row border-top border-bottom border-secondary mt-4">
                            <!-- buttons  -->
                            <div class="form-group row mt-3 ml-5 ">

                                <button type="button" class="btn btn-info btn-sm ml-5" data-id="null" id="generar"><i
                                        class="fa fa-cogs"></i> Generar Consecutivo </button>
                                <button type="button" class="btn btn-secondary btn-sm ml-3" id="nuevo" disabled><i
                                        class="fa fa-slack"></i> Nuevo Consecutivo </button>

                            </div>
                            <!-- fin buttons  -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?= base_url('resources/js/app/token/validar.js'); ?>"></script>
    <script src="<?= base_url('resources/js/app/inicio/inicio.js'); ?>"></script>

</body>

</html>