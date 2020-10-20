<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Tokens</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/js/DataTables/datatables.min.css'); ?>">

</head>

<body>

    <?php  $this->load->view('base/menu-admin'); ?>


    <div class="container text-right">
        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-3 ml-3  p-1">
                Tokens / Generar
            </div>
        </div>
    </div>


    <!-- numero de oonsecutivos generados  -->

    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-5 mt-3 overflow-hidden">
                <div class="card" style="width: 25rem;">
                    <div class="card-img-top fnd-token text-center pt-2">
                        < / <i class="fa fa-desktop"></i> >
                    </div>
                    <div class="card-body text-center">

                        <?= form_open('tokens/generarToken',['id' => 'frmToken']);  ?>

                        <div class="form-group text-left">
                            <label for="equipo">Equipo: </label>
                            <input type="text" class="form-control form-control-sm text-uppercase" name="equipo"
                                id="equipo" autocomplete="off">
                            <span class="text-danger" id="err_equipo"></span>
                        </div>

                        <div class="my-4">
                            <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-cog"></i>
                                Generar Token</button>
                            <button type="button" class="btn btn-sm btn-danger ml-3" id="delToken"> <i
                                    class="fa fa-times"></i>
                                Remover Token</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--  fin numero de oonsecutivos generados  -->


    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

    <script src="<?= base_url('resources/js/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?= base_url('resources/js/app/token/generar.js')?>"></script>

    <?=  $this->session->flashdata('notificacion'); ?>

</body>

</html>