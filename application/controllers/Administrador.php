<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {


     
     public function __construct()
     {
         parent::__construct();       
         $this->load->model('usuario_mdl');
         $this->load->helper('seguridad');
     }
     

    public function index(){
        sesionActiva();
        
        $data['consecutivos'] = $this->ultimosConsecutivos();
        
        $this->load->view('administrador/administrador' ,$data);        
    } # fin index

    private function ultimosConsecutivos(){

        $this->load->model('documento_mdl');
        $this->load->model('consecutivo_mdl');

        $anio = date('Y');
        $consecutivos = null;

        $documentos  = $this->documento_mdl->listDocumentos();

             foreach ( $documentos as $documento ) {
                     
                 $data['anio'] = $anio;
                 $data['documento'] = $documento->iddocumento;

                 $ultimo = $this->consecutivo_mdl->ultimoConsecutivo( $data );

                 $consecutivos[] = ['documento' => $documento->descripcion , 'numero' => $ultimo->numero ];

             }     
             
          return $consecutivos;   

    }

    public function registro(){

         if ( $this->usuario_mdl->usuariosRegistrados() > 0 )
             redirect('login','location');
         else
             $this->load->view('administrador/registro');       

    }  # fin registro

    public function registroAdmin(){

      $this->load->helper('seguridad');
      $this->load->helper('validar_administrador');

      $fields['nombre']   = clean_field( $this->input->post('nombre'));
      $fields['password'] = clean_field( $this->input->post('password'));
      $fields['passconf'] = clean_field( $this->input->post('passconf'));

          
          if ( validarForm( $fields ) ){

              unset($fields['passconf']);
              
              $fields['idusuario'] = uniqid('AD');
              $fields['password']  = password_hash($fields['password'],PASSWORD_DEFAULT);
              $fields['usuario']   = 'Administrador';
             
              $adm = $this->usuario_mdl->registrarAdmin( $fields );               
              
                 if ( is_array( $adm ) ) {
                    $this->session->set_flashdata('notificacion','<script>swal("Error '. $adm['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');   
                 }else{
                     $this->session->set_flashdata('notificacion','<script>swal("Administrador Creado", "", "success" , {buttons: "Aceptar"});</script>');                                         
                }
                    redirect('login','location');
          }    


    } # fin registro admin

    public function finSesion(){

        $sesiones = ['ss-id', 'ss-user'];

        $this->session->unset_userdata($sesiones);

        redirect('login','location');

    } # fin finSesion

 

}

/* End of file Administrador.php */
