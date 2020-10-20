<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Usuario_mdl extends CI_Model {
     
    
    function usuariosRegistrados(){

        return $this->db->count_all('usuarios');
        
    }


    function listUsuarios(){

      $qry = $this->db->get('usuarios');

      return $qry->result();

    }
      
    function registrarAdmin( $fields ){
      
       $qry = $this->db->insert('usuarios', $fields );

       if ( ! $qry )    
         $qry = $this->db->error(); 
       
         return $qry;
    }

    function login( $data ){
 
      $qry = $this->db->query("select idusuario, password from usuarios where BINARY usuario = '$data'");

      return $qry->result();
     
    }
   
    function findUsuario( $data ){

       $qry = $this->db->where('idusuario', $data)
                       ->get('usuarios');
        
       return $qry->row();

    }
    
    function cambioPassword( $data ){

        $qry = $this->db->set('actualizado', date('Y-m-d H:i:s') )
                        ->where('idusuario', $data['idusuario'])
                        ->update('usuarios');

        if ( ! $qry )
          $qry = $this->db->error();

        return $qry;   

    }

    function store( $data ){

       $qry = $this->db->insert('usuarios' , $data );

       if ( ! $qry )
           $qry = $this->db->error();

       return $qry;   

    }

    function update( $id , $data ){
        
       unset( $data['idusuario']);
       
      $qry = $this->db->set('actualizado', date('Y-m-d H:i:s') )
                       ->where('idusuario', $id)
                       ->update('usuarios', $data );

       if ( ! $qry )
          $qry = $this->db->error();
           
       return $qry;                        

    }

    function delete( $data ){

        $qry = $this->db->delete('usuarios' , ['idusuario' => $data ]);
        
        if ( ! $qry )
          $qry = $this->db->error();
         
        return $qry;  

    }
 
 }
 
 /* End of file Usuario_mdl.php */

 