<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 

     
     public function __construct(){
         parent::__construct();     
         $this->load->model('usuario_mdl');  
         $this->load->helper('seguridad');          
      
    }

     public function index( $token = null ){      
             
           if ( $this->usuario_mdl->usuariosRegistrados() === 0 )
                 redirect('administrador/registro','location'); 
           elseif ( $this->session->userdata('ss-user') !== NULL )                
                redirect('administrador','location');                         
            else {

                 if ( $token !== null ) 
                    $this->session->set_flashdata('notificacion','<script>swal("Token No Valido", "Contacta a tu Administrador", "info" , {buttons: "Aceptar"});</script>');                
                    
                $this->load->view('login/login');
            }       
        
     } # fin index

     public function acceso(){
       
        $this->load->helper('validar_login');

        $fields['usuario']  = clean_field( $this->input->post('usuario'));
        $fields['password'] = clean_field( $this->input->post('password'));
        $valido = TRUE;

         if ( validarLogin( $fields ) ){

             $usuario =  $this->usuario_mdl->login( $fields['usuario'] );

             if ( count( $usuario ) > 0 ){

                  
                  if ( $usuario[0]->activo === '0' ){

                    $this->session->set_flashdata('notificacion','<script>swal("Acceso Denegado", "Contacta a tu Administrador", "info" , {buttons: "Aceptar"});</script>');
                
                    $this->session->set_flashdata('usuario', $fields['usuario']);

                    redirect('login','location');

                  }

                 $password = password_verify(  $fields['password'] , $usuario[0]->password );

                if ( $password )  {
                    
                    $this->session->set_userdata('ss-id', $usuario[0]->idusuario );
                    $this->session->set_userdata('ss-user', $fields['usuario']);
                   
                    redirect('administrador','refresh');
                    
                }                
                else{

                     $valido = FALSE;                   
                }

             }else{                
                $valido = FALSE;
             }

             if ( ! $valido ) {

                $this->session->set_flashdata('notificacion','<script>swal("Error !!", "Verifica Tu Informacion", "error" , {buttons: "Aceptar"});</script>');
                
                $this->session->set_flashdata('usuario', $fields['usuario']);
                $this->session->set_flashdata('password', $fields['password']);
                
                redirect('login','location');
             }

         }

     } # fin acceso
 
 }
 
 /* End of file Login.php */
 