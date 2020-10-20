<?php defined('BASEPATH') OR exit('No direct script access allowed');

function clean_field( $field ){

    $CI =& get_instance();
   
    $field = trim( $CI->security->xss_clean( $field ) ) ;

    return $field;

}
