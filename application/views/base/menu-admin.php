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

             <!-- menu  -->

             <nav class="navbar navbar-expand-lg navbar-light bg-white p-0" style="margin-top:-8px;">

                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                             <a class="nav-link text-secondary text-uppercase"
                                 href="<?=base_url('administrador');?>">inicio</a>
                         </li>
                         <li class="nav-item active">
                             <a class="nav-link text-secondary text-uppercase" href="<?=base_url('areas');?>">Areas</a>
                         </li>
                         <li class="nav-item active">
                             <a class="nav-link text-secondary text-uppercase"
                                 href="<?=base_url('documentos');?>">Documentos</a>
                         </li>
                         <li class="nav-item dropdown menu-area">
                             <a class="nav-link dropdown-toggle text-secondary text-uppercase "
                                 href="javascript:void();" id="viml" role="button" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                 TOKENS
                             </a>
                             <div class="dropdown-menu mega-area" aria-labelledby="vim">

                                 <a class="dropdown-item" href="<?= base_url('tokens');?>"> <i
                                         class="fa fa-list-alt"></i> Lista de Tokens</a>

                                 <a class="dropdown-item" href="<?= base_url('tokens/generar');?>"> <i
                                         class="fa fa-cog"></i> Generar Token</a>

                             </div>
                         </li>
                         <li class="nav-item active">
                             <a class="nav-link text-secondary text-uppercase"
                                 href="<?=base_url('usuarios');?>">usuarios</a>
                         </li>

                         <li class="nav-item active">
                             <a class="nav-link text-secondary text-uppercase"
                                 href="<?=base_url('consultas');?>">Consulta</a>
                         </li>

                         <li class="nav-item active">
                             <a class="nav-link text-secondary text-uppercase"
                                 href="<?=base_url('inicio');?>"><i class="fa fa-list-ol"></i></a>
                         </li>

                         <li class="nav-item dropdown menu-area">
                             <a class="nav-link dropdown-toggle text-info text-uppercase " href="javascript:void();"
                                 id="viml" role="button" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 <i class="fa fa-user-circle-o pr-1"></i> <?= $this->session->userdata('ss-user');?>
                             </a>
                             <div class="dropdown-menu mega-area" aria-labelledby="vim">

                                 <a class="dropdown-item" href="<?= base_url('administrador/finSesion');?>"> <i
                                         class="fa fa-power-off"></i> Cerrar Sesion</a>

                             </div>
                         </li>
                     </ul>
                 </div>
             </nav>
             <!-- fin menu  -->
         </div>
     </div>

 </div>
 <!-- fin header  -->