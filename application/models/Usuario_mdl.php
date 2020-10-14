<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Usuario_mdl extends CI_Model {
     
    
    function usuariosRegistrados(){

        return $this->db->count_all('usuarios');
        
    }

    function registrarAdmin( $fields ){
      
       $qry = $this->db->insert('usuarios', $fields );

       if ( ! $qry )    
         $qry = $this->db->error(); 
       else
         $qry;   

    }

    function login( $data ){
 
      $qry = $this->db->query("select idusuario, password from usuarios where BINARY usuario = '$data'");

      return $qry->result();

    }
 
 }
 
 /* End of file Usuario_mdl.php */

 