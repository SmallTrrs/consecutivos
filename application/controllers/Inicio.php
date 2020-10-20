<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Inicio extends CI_Controller {
 
     public function index(){

         $this->load->model('areas_mdl');
         $this->load->model('documento_mdl');

         $data['areas']      = $this->areas_mdl->listAreas();
         $data['documentos'] = $this->documento_mdl->listDocumentos();
         $data['ss_activa'] = $this->session->userdata('ss-user') === null ? 'false' : 'true';
         
         $this->load->view('inicio/inicio', $data );
         
     } # fin index

   
 }
 
 /* End of file Inicio.php */
 