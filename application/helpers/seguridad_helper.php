<?php defined('BASEPATH') OR exit('No direct script access allowed');

function clean_field( $field ){

    $CI =& get_instance();
   
    $field = trim( $CI->security->xss_clean( $field ) ) ;

    return $field;

}

function sesionActiva(){

    $CI =& get_instance();

    $CI->load->library('session');

    if ( $CI->session->userdata('ss-user') === NULL )
          redirect('login','location');         
    else     
         return TRUE;
        

}