<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Tokens extends CI_Controller {
 
     
     public function __construct(){
         parent::__construct();
         $this->load->model('token_mdl');
     }
     

     public function index(){

         sesionActiva();

         $data['tokens'] = $this->token_mdl->listToken(); 
         $this->load->view('tokens/tokens', $data );
         
     } # fin index

     public function generar(){

        sesionActiva();

        $this->load->view('tokens/token-generar');
        
     }# fin generar

     public function generarToken(){
        
        sesionActiva();

        $this->load->model('token_mdl');
         
        $data['idtoken'] = uniqid('TK'); 
        $data['equipo']  = strtoupper($this->input->post('equipo'));
 
        $token = $this->token_mdl->store( $data ); 
 
            if ( is_array( $token ) ){
 
                $this->session->set_flashdata('notificacion','<script>swal("Error '. $token['code'].'", "Ocurrio un problema al generar el token", "error" , {buttons: "Aceptar"});</script>');    
            }
            else{
 
                $this->session->set_flashdata('notificacion',"<script>swal('Token Generado', '', 'success' , {buttons: 'Aceptar'}); localStorage.setItem('tkngc', '{$data['idtoken']}') </script>");   
            }
 
          
          redirect('tokens/generar','location');
          
 
     } # fin generarToken

     public function validar(){

        $token = $this->input->post('token');

        $valido = $this->token_mdl->validarToken( $token );
 
           if( count( $valido ) === 0  ){
               echo 'invalido';
           }
           else{
               $this->token_mdl->update( $token );
               echo 'valido';
           }
       

     } # fin validar

     public function delete(){
        
        sesionActiva();
        
        $tokens = $this->input->post('tokens');

        if ( $tokens !== null )
             $this->token_mdl->delete( $tokens );    
             
           $this->session->set_flashdata('notificacion',"<script>swal('Tokens Eliminados', '', 'success' , {buttons: 'Aceptar'}); </script>");       
        
        redirect('tokens','location');
        

     } # fin delete
 
 }
 
 /* End of file Tokens.php */
 
