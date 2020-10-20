<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Areas_mdl extends CI_Model {
 
    function store( $data ){

      $qry = $this->db->insert('areas', $data );
      
      if ( ! $qry )    
      $qry = $this->db->error(); 
     
       return $qry;

    } # fin store

    function update( $data ){

      $qry = $this->db->set('descripcion', $data['descripcion'])
                      ->set('actualizado', date('Y-m-d H:i:s') )
                      ->where('idarea', $data['idarea'])
                      ->update('areas');

      return $qry;

    }

    function delete( $data ){

       $qry = $this->db->where('idarea', $data)
                       ->delete('areas');

         if ( ! $qry )
              $qry = $this->db->error();
      
         return $qry;

    } # fin delete

   function listAreas(){
   
      $qry = $this->db->order_by('descripcion', 'ASC')
                       ->get('areas');

      return $qry->result(); 
   } # fin listArea

   function findArea( $data ){

    $qry = $this->db->where('idarea', $data)
                    ->get('areas');
    
    return $qry->row_object();

  } # fin findArea
      
 }
 
 /* End of file Areas_mdl.php */
 
