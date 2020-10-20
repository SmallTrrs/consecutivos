<?php 
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Token_mdl extends CI_Model {
  
        
      function listToken(){

         $qry = $this->db->query('SELECT idtoken, equipo, DATE_FORMAT( ultimo_acceso, "%d-%m-%Y" ) as ultimo_acceso, DATEDIFF( CURDATE(), ultimo_acceso ) as inactivo FROM tokens ORDER BY inactivo DESC');

         return $qry->result();

      }

      function validarToken( $data ){

           $qry = $this->db->get_where('tokens' ,['idtoken'=>  $data]);

           return $qry->result();

      } # fin validarToken

      function store( $data ){

        $qry = $this->db->set('ultimo_acceso', date('Y-m-d'))
                        ->insert('tokens', $data );

        if ( ! $qry )
             $qry = $this->db->error(); 
       
        return $qry;
        
      } # fin store

      function update( $data){

         $qry = $this->db->where('idtoken', $data)
                         ->update('tokens' ,['ultimo_acceso' => date('Y-m-d')]);

         if ( ! $qry )                
             $qry = $this->db->error();

        return $qry;     

      }

      function delete( $data ){

          foreach ( $data as $value ) {

             $qry = $this->db->where('idtoken', $value)
                             ->delete('tokens');
          }

      } # fin delete
  
  }
  
  /* End of file Token_mdl.php */
  
  