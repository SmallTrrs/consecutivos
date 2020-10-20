<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function validarConsecutivo( $fields ){

    $CI =& get_instance();

    $CI->load->library(['form_validation','session']);

     $validar = $CI->form_validation;
     $session = $CI->session;

     if ( $validar->run('consecutivo') === FALSE ){

         # Variables para mostrar el error

        if ( $validar->error('asunto') )
              $session->set_flashdata('err_asunto', $validar->error('asunto','',''));
      
        if ( $validar->error('remitente') )
              $session->set_flashdata('err_remitente', $validar->error('remitente','',''));

        if ( $validar->error('destinatario') )
              $session->set_flashdata('err_destinatario', $validar->error('destinatario','',''));
      
         # Variables para repoblar el formulario
         
         $session->set_flashdata('asunto', $fields['asunto']);
         $session->set_flashdata('remitente', $fields['remitente']);
         $session->set_flashdata('destinatario', $fields['destinatario']);
         $session->set_flashdata('referencia', $fields['referencia']);
         $session->set_flashdata('area', $fields['idarea']);
        
          redirect('consecutivos/update/'.$fields['idconsecutivo'],'location');

     }else{

        return true; 
     }


}