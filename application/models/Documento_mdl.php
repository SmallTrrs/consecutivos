<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documento_mdl extends CI_Model {

    function store( $data ){

        $qry = $this->db->insert('documentos', $data );
        
        if ( ! $qry )    
        $qry = $this->db->error(); 
       
         return $qry;
  
      } # fin store
  
      function update( $data ){
  
        $qry = $this->db->set('descripcion', $data['descripcion'])
                        ->set('actualizado', date('Y-m-d H:i:s') )
                        ->where('iddocumento', $data['iddocumento'])
                        ->update('documentos');
  
        return $qry;
  
      }
  
      function delete( $data ){
  
         $qry = $this->db->where('iddocumento', $data)
                         ->delete('documentos');
  
           if ( ! $qry )
                $qry = $this->db->error();
        
           return $qry;
  
      } # fin delete
  
     function listDocumentos(){
     
        $qry = $this->db->order_by('descripcion', 'ASC')
                        ->get('documentos');
  
        return $qry->result(); 

     } # fin listDocumentos
  
     function findDocumento( $data ){
  
      $qry = $this->db->where('iddocumento', $data)
                      ->get('documentos');
      
      return $qry->row_object();
  
    } # fin findDocumento
        

}

/* End of file Documento_mdl.php */
