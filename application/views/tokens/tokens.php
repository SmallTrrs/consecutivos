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
                Tokens / Principal
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-9 p-3 bg-light rounded-lg">

              <?= form_open('tokens/delete'); ?>

                <div class="row m-0 mt-2 p-0">
                    <div class="offset-md-9 mb-4 pl-5">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Eliminar
                            Tokens</button>
                    </div>
                </div>

                <div class="mx-1 mb-4">
                    <table id="tblTokens" class=" table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:20%">Token</th>
                                <th style="width:30%">Equipo</th>
                                <th class="text-center" style="width:20%">Ultimo Acceso</th>
                                <th class="text-right" style="width:20%">Dias Inactivo</th>
                                <th class="text-center" style="width:10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $tokens as $token ) : ?>
                           <tr>
                            <td><?= $token->idtoken; ?></td>
                            <td><?= $token->equipo ?></td>
                            <td class="text-center"><?= $token->ultimo_acceso; ?></td>
                            <td class="text-right"><?= $token->inactivo ?></td>
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="tokens[]" class="custom-control-input" id="<?= $token->idtoken; ?>" value="<?= $token->idtoken; ?>" >
                                    <label class="custom-control-label" for="<?= $token->idtoken; ?>"></label>
                                </div>
                            </td>
                            </tr>  
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Token</th>
                                <th>Equipo</th>
                                <th class="text-center">Ultimo Acceso</th>
                                <th class="text-right">Dias Inactivo</th>
                                <th class="text-center" style="width:10%">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <?= form_close(); ?>
            </div>
        </div>

    </div>

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

    <script src="<?= base_url('resources/js/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?= base_url('resources/js/app/token/tokens.js')?>"></script>

    <?=  $this->session->flashdata('notificacion'); ?>

</body>

</html>