<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function validarLogin( $fields ){

    $CI =& get_instance();

    $CI->load->library(['form_validation','session']);

     $validar = $CI->form_validation;
     $session = $CI->session;

     if ( $validar->run('login') === FALSE ){

         # Variables para mostrar el error

        if ( $validar->error('usuario') )
              $session->set_flashdata('err_usuario', $validar->error('usuario','',''));
        
        if ( $validar->error('password') )
              $session->set_flashdata('err_password', $validar->error('password','',''));

                # Variables para repoblar el formulario
         
         $session->set_flashdata('usuario', $fields['usuario']);
         $session->set_flashdata('password', $fields['password']);
       
         redirect('login','location');

     }else{

        return true; 
     }


}