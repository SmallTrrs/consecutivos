<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Documentos</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>

<link rel="stylesheet" href="<?= base_url('resources/js/DataTables/datatables.min.css'); ?>">

</head>

<body>

    <?php  $this->load->view('base/menu-admin'); ?>

    <div class="container text-right">
        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center my-3 ml-3  p-1">
                Documentos / Principal
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">

            <div class="offset-md-1 col-md-9 p-3 bg-light rounded-lg">

                <div class="row m-0 p-0">
                    <div class="offset-md-8 mb-4 pl-5">
                        <a href="<?=base_url('documentos/store'); ?>" class="btn btn-sm btn-secondary"><i
                                class="fa fa-plus-circle"></i> Crear Nuevo Documento</a>
                    </div>
                </div>

                <div class="mx-5 mb-4">
                    <table id="tblDocumentos" class=" table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50%">Documento</th>
                                <th class="text-right" style="width:50%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  if ( count( $documentos) > 0 ): ?>

                            <?php foreach( $documentos as $documento ): ?>
                            <tr>
                                <td class="p-1"><?= $documento->descripcion; ?></td>
                                <td class="text-right p-1">
                                    <div class="dropdown mr-3">
                                        <button class="btn btn-sm btn-light" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fa fa-ellipsis-v"></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="<?= base_url('documentos/update/'.$documento->iddocumento); ?>"><span
                                                    class="fa fa-edit"></span> Editar</a>
                                            <button class="dropdown-item eliminar" data-id="<?=$documento->iddocumento;?>"><span
                                                    class="fa fa-trash"></span> Eliminar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php  endif; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Area</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
        </div>

    </div>

    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

    <script src="<?= base_url('resources/js/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('resources/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?= base_url('resources/js/app/documentos/documentos.js')?>"></script>
    <?=  $this->session->flashdata('notificacion'); ?>

</body>

</html>