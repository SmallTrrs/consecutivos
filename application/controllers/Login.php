<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 

     
     public function __construct(){
         parent::__construct();     
         $this->load->model('usuario_mdl');  
         $this->load->helper('seguridad');          
      
    }

     public function index(){      
             
           if ( $this->usuario_mdl->usuariosRegistrados() === 0 )
                 redirect('administrador/registro','location'); 
           elseif ( $this->session->userdata('ss-user') !== NULL )                
                redirect('administrador','location');                         
            else        
                $this->load->view('login/login');
        
     } # fin index

     public function acceso(){
       
        $this->load->helper('validar_login');

        $fields['usuario']  = clean_field( $this->input->post('usuario'));
        $fields['password'] = clean_field( $this->input->post('password'));

         if ( validarLogin( $fields ) ){

             $usuario =  $this->usuario_mdl->login( $fields['usuario'] );

             if ( count( $usuario ) > 0 ){

                $password = password_verify(  $fields['password'] , $usuario[0]->password );

                if ( $password )  {
                    
                    $this->session->set_userdata('ss-id', $usuario[0]->idusuario );
                    $this->session->set_userdata('ss-user', $fields['usuario']);
                   
                    redirect('administrador','refresh');
                }                
                else{

                    $this->session->set_flashdata('notificacion','<script>swal("Error !!", "Verifica Tu Informacion", "error" , {buttons: "Aceptar"});</script>');
                    
                    redirect('login','location',);
                    
                }                  

             }

         }



     } # fin acceso
 
 }
 
 /* End of file Login.php */
 