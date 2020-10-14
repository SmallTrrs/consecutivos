<?php  $this->load->view('base/head'); # Carga Inicio HTML  ?>

<title></title>

<?php  $this->load->view('base/scripts-ini');  # Carga scripts inicio de pagina ?> 

 <script>var baseUrl = "<?=base_url(); ?>";</script> 
</head>
<body>


   pagina para consecutivo
 
   <?php  $this->load->view('base/scripts-fin');  # Carga scripts final de pagina ?> 
    
    <script src="<?= base_url('resources/js/app/token/token.js'); ?>"></script>
    <script src="<?= base_url('resources/js/app/inicio/inicio.js'); ?>"></script>

</body>
</html>



