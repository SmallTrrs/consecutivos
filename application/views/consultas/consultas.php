<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Consultas</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/js/DataTables/datatables.min.css'); ?>">
<script>var ss_activa="<?= $ss_activa ?>";</script>
</head>

<body>

    <?php if ( $this->session->userdata('ss-user') === null )
                $this->load->view('base/menu'); 
           else     
                $this->load->view('base/menu-admin'); 
    ?>


    <div class="container text-right">
        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-3 ml-3  p-1">
                Consulta
            </div>
        </div>
    </div>

    <div class="container border bg-light rounded pt-3">


        <div class="row mb-4 border-bottom pb-4">
            <div class="offset-md-4 col-md-3">
                <label for="documento">Documento: </label>
                <select class="custom-select custom-select-sm" id="documento">
                    <option value="0">- - - - - - - - - - - - - - - - - - - -</option>
                    <?php foreach( $documentos as $documento ): ?>
                    <option value="<?= $documento->iddocumento ?>"><?= $documento->descripcion ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="text-danger" id="err_documento"></span>
            </div>
            <div class="col-md-2">
                <label for="anio">Año: </label>
                <select class="custom-select custom-select-sm" id="anio">
                    <option value="0">- - - - - - - - - - -</option>
                    <?php foreach( $anios as $anio ): ?>
                    <option value="<?= $anio->anio ?>"><?= $anio->anio ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="text-danger" id="err_anio"></span>
            </div>
            <div class="col-md-2 pt-4">
                <button type="button" class="btn btn-sm btn-dark mt-1 px-4" id="buscar"><i class="fa fa-search"></i>
                    Buscar</button>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 ">
                <div class="mb-4">
                    <table id="tblConsecutivos" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10%">Numero</th>
                                <th style="width:25%">Asunto</th>
                                <th style="width:25%">Destinatario</th>
                                <th style="width:10%">Fecha</th>
                                <th style="width:10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Numero</th>
                                <th>Asunto</th>
                                <th>Destinatario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- modal  -->
    <div class="modal fade" id="detalle" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
             
                <!-- modal-body  -->
                <div class="modal-body px-5">

                    <div class="row border border-info shadow-sm py-2">
                       
                        <div class="col-md-9 text-info text-uppercase ml-3" style="font-size: 25px;">
                         <span id="cn-numero"></span> / <span id="cn-documento"></span>
                        </div>
                        <div class="col-md-2 text-right">  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-window-close"></i> Cerrar</button> </div>
                    </div>

                    <div class="row border-bottom py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Asunto:</div>
                        <div class="col-md-9 text-muted" id="cn-asunto"></div>
                    </div>

                    <div class="row border-bottom py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Remitente:</div>
                        <div class="col-md-9 text-secondary" id="cn-remitente"></div>
                    </div>

                    <div class="row border-bottom py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Destinatario:</div>
                        <div class="col-md-9 text-secondary" id="cn-destinatario"></div>
                    </div>
                    <div class="row border-bottom py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Referencia:</div>
                        <div class="col-md-9 text-secondary" id="cn-referencia"></div>
                    </div>

                    <div class="row border-bottom py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Area que genero:</div>
                        <div class="col-md-9 text-secondary text-uppercase" id="cn-area"></div>
                    </div>

                    <div class="row py-3">
                        <div class="col-md-3 text-dark font-weight-bold">Fecha de creacion:</div>
                        <div class="col-md-9 text-secondary" id="cn-creado"></div>
                    </div>

                </div>
                <!-- fin modal-body  -->

            </div>
        </div>
    </div>
    <!-- fin modal  -->

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

    <script src="<?= base_url('resources/js/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?= base_url('resources/js/app/token/validar.js'); ?>"></script>
    <script src="<?= base_url('resources/js/app/consultas/consultas.js')?>"></script>

    <?=  $this->session->flashdata('notificacion'); ?>

</body>

</html>