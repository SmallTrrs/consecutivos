<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Denegado extends CI_Controller {

    public function index(){
        $this->load->view('denegado/denegado');
        
    }# fin index
    
    public function notfound(){
        $this->load->view('denegado/notfound');
    } # fin notfound

}

/* End of file Denegado.php */
