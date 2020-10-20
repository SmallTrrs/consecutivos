<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

      
      public function __construct()
      {
          parent::__construct();
          $this->load->model('consecutivo_mdl');
      }
      
    public function index(){

        $this->load->model('documento_mdl');
                
        $data['documentos'] = $this->documento_mdl->listDocumentos();
        $data['anios'] = $this->consecutivo_mdl->anios();
        $data['ss_activa'] = $this->session->userdata('ss-user') === null ? 'false' : 'true';

        $this->load->view('consultas/consultas', $data);
        
    } # fin index

    public function lista(){

      $data['documento'] = $this->input->post('documento');
      $data['anio'] = $this->input->post('anio');

      $lista['data'] = $this->consecutivo_mdl->consecutivosAnio( $data );

       echo json_encode( $lista );

    } # fin lista

}

/* End of file Consultas.php */
