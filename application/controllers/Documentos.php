<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('seguridad');
        $this->load->helper('validar_documento');
        $this->load->model('documento_mdl');   
        sesionActiva();       
    }
    
  
  public function index(){        

      $data['documentos'] = $this->documento_mdl->listDocumentos();

       $this->load->view('documentos/documentos', $data ); 
       
  } # fin index

  public function store(){
     $this->load->view('documentos/documento-store');       
  } # fin store 

  public function update( $id = null ){

    $data['documento'] = $this->documento_mdl->findDocumento( $id );  
     
    $this->load->view('documentos/documento-update', $data );
     
  } # fin update

  public function delete( $id = null ){

      $documento = $this->documento_mdl->delete( $id );
      
      if ( is_array( $documento ) )
        $this->session->set_flashdata('notificacion','<script>swal("Error !!", "No Se Pudo Elimimar El Documento", "error" , {buttons: "Aceptar"});</script>');
      else
        $this->session->set_flashdata('notificacion','<script>swal("Documento Eliminado", "", "success" , {buttons: "Aceptar"});</script>'); 

        
        redirect('documentos','location');
        

  } # fin delete

  // funciones para interaccion con base de datos
  
    public function store_db(){
                        
       $fields['descripcion'] = clean_field($this->input->post('descripcion'));   
       
       if ( validarCampo( $fields , 'store') ){

            $fields['iddocumento'] = uniqid('DC');

           $documento = $this->documento_mdl->store( $fields );

           if ( is_array( $documento ) ) {
            $this->session->set_flashdata('notificacion','<script>swal("Error '. $documento['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');   
          }else{
              $this->session->set_flashdata('notificacion','<script>swal("Documento Registrado", "", "success" , {buttons: "Aceptar"});</script>');
          }

            redirect('documentos/store','location');

       }

    } # fin store_db

  public function update_db(){

      $fields['iddocumento'] = clean_field($this->input->post('iddocumento')); 
      $fields['descripcion'] = clean_field($this->input->post('descripcion'));   
       
      if ( validarCampo( $fields , 'update') ){
              
           $documento = $this->documento_mdl->update( $fields );

           if ( is_array(  $documento ) ){
             $this->session->set_flashdata('notificacion','<script>swal("Error '. $documento['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');   
           }else{

              $this->session->set_flashdata('notificacion','<script>swal("Documento Actualizado", "", "success" , {buttons: "Aceptar"});</script>');
              
              redirect('documentos/update/'.$fields['iddocumento'],'location');
           }
      }
  }
}

/* End of file Documentos.php */
