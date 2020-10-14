<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function validarForm( $fields ){

    $CI =& get_instance();

    $CI->load->library(['form_validation','session']);

     $validar = $CI->form_validation;
     $session = $CI->session;

     if ( $validar->run('regAdmin') === FALSE ){

         # Variables para mostrar el error

        if ( $validar->error('nombre') )
              $session->set_flashdata('err_nombre', $validar->error('nombre','',''));
        
        if ( $validar->error('password') )
              $session->set_flashdata('err_password', $validar->error('password','',''));

        if ( $validar->error('passconf') )
              $session->set_flashdata('err_passconf', $validar->error('passconf','',''));

         # Variables para repoblar el formulario
         
         $session->set_flashdata('nombre', $fields['nombre']);
         $session->set_flashdata('password', $fields['password']);
         $session->set_flashdata('passconf', $fields['passconf']);
        
         redirect('administrador/registro','location');

     }else{

        return true; 
     }


}