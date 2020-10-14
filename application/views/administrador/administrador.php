<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title>Administrador</title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?>
</head>

<body>

    <!-- header  -->
    <div class="container-fluid bg-white fixed-top shadow pt-3" style="height: 60px;">

        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-2 offset-md-1 bg-secondary p-1 text-white text-center font-weight-bold">AP</div>
                    <div class="col-md-6 bg-dark text-white text-center p-1 "><span>CONSECUTIVOS</span></div>
                </div>
            </div>
            <div class="col-md-9">
                <?php  $this->load->view('base/menu-admin');  ?>
            </div>
        </div>

    </div>
    <!-- fin header  -->

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>

    <!-- banner consecutiivos generados  -->
    <div class="container text-right">

        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center mb-3 ml-3  p-1">

                CONSECUTIVOS GENERADOS

            </div>
        </div>
    </div>

    <!--  fin banner consecutiivos generados  -->

    <!-- numero de oonsecutivos generados  -->

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top fnd-numero text-center pt-2">100</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">OFICIO</h5>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top fnd-numero text-center pt-2">100</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">EXHORTO</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top fnd-numero text-center pt-2">100</div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">MEMORANDUM</h5>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--  fin numero de oonsecutivos generados  -->


    <!-- banner generar nuevo token  -->
    <div class="container text-right mt-4">

        <div class="row">
            <div class="col-md-3 bg-dark text-white text-center mb-3 ml-3  p-1">

                GENERACION DE NUEVO TOKEN

            </div>
        </div>
    </div>

    <!--  fin banner generar nuevo token  -->

    <!-- numero de oonsecutivos generados  -->

    <div class="container">

        <div class="row">

            <div class="offset-md-1 col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-top fnd-numero text-center pt-2">< / <i class="fa fa-desktop"></i> > </div>
                    <div class="card-body text-center">
                       <button type="button" class="btn btn-outline-primary">Generar Token</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--  fin numero de oonsecutivos generados  -->




    <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?>

</body>

</html>