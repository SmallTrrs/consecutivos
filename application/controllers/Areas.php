<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

      
      public function __construct(){
          parent::__construct();
          $this->load->helper('seguridad');
          $this->load->helper('validar_area');
          $this->load->model('areas_mdl'); 
          
          sesionActiva();
      }
      
    
    public function index(){        

        $data['areas'] = $this->areas_mdl->listAreas();

        $this->load->view('areas/areas', $data ); 
         
    } # fin index

    public function store(){
       $this->load->view('areas/area-store');       
    } # fin store 

    public function update( $id = null ){

      $data['area'] = $this->areas_mdl->findArea( $id );  
       
      $this->load->view('areas/area-update', $data );
       
    } # fin update

    public function delete( $id = null ){

        $area = $this->areas_mdl->delete( $id );
        
        if ( is_array( $area ) )
          $this->session->set_flashdata('notificacion','<script>swal("Error !!", "No Se Pudo Elimimar El Area", "error" , {buttons: "Aceptar"});</script>');
        else
          $this->session->set_flashdata('notificacion','<script>swal("Area Eliminada", "", "success" , {buttons: "Aceptar"});</script>'); 
          
          redirect('areas','location');
          

    } # fin delete

    // funciones para interaccion con base de datos
    
      public function store_db(){
                          
         $fields['descripcion'] = clean_field($this->input->post('descripcion'));   
         
         if ( validarCampo( $fields , 'store') ){

              $fields['idarea'] = uniqid('AR');

             $area = $this->areas_mdl->store( $fields );

             if ( is_array( $area ) ) 
               $this->session->set_flashdata('notificacion','<script>swal("Error '. $area['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');               
            else                
              $this->session->set_flashdata('notificacion','<script>swal("Area Registrada", "", "success" , {buttons: "Aceptar"});</script>');               
            
            redirect('areas/store','location');

         }

      } # fin store_db

    public function update_db(){

        $fields['idarea'] = clean_field($this->input->post('idarea')); 
        $fields['descripcion'] = clean_field($this->input->post('descripcion'));   
         
        if ( validarCampo( $fields , 'update') ){
                
             $area = $this->areas_mdl->update( $fields );

             if ( is_array(  $area ) ){
                $this->session->set_flashdata('notificacion','<script>swal("Error '. $area['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');   
             }else{
                $this->session->set_flashdata('notificacion','<script>swal("Area Actualizada", "", "success" , {buttons: "Aceptar"});</script>');                
              }
              
              redirect('areas/update/'.$fields['idarea'],'location');
        }
    }

}

/* End of file Areas.php */
