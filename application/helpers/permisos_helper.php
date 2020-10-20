<?php defined('BASEPATH') OR exit('No direct script access allowed');

function sesionActiva(){

$CI =& get_instance();

$CI->load->library('session');

if ( $CI->session->userdata('ss-user') === NULL )
      redirect('denegado','location');         
else     
     return TRUE;    

}