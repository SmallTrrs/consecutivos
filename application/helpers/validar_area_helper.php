<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function validarCampo( $fields , $accion ){

    $CI =& get_instance();

    $CI->load->library(['form_validation','session']);

     $validar = $CI->form_validation;
     $session = $CI->session;

     if ( $validar->run('unico') === FALSE ){

         # Variables para mostrar el error

        if ( $validar->error('descripcion') )
              $session->set_flashdata('err_descripcion', $validar->error('descripcion','',''));
      
         # Variables para repoblar el formulario
         
         $session->set_flashdata('descripcion', $fields['descripcion']);
         
         if ( $accion === 'store')
         redirect('areas/store','location');
         else
         redirect('areas/update/'.$fields['idarea'],'location');

     }else{

        return true; 
     }


}