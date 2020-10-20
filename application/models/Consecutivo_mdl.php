<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consecutivo_mdl extends CI_Model {


    function store( $data ){

      $qry = $this->db->insert('consecutivos', $data);

       if ( ! $qry )
           $qry = $this->db->error();

       return $qry;    

    }  # fin store

    function update( $data ){

       $qry = $this->db->set('actualizado', date('Y-m-d H:i:s') )
                       ->where('idconsecutivo', $data['idconsecutivo'] )
                       ->update('consecutivos', $data );
        if ( ! $qry )
             $qry = $this->db->error();
           
       return $qry;      

    } # fin update


    function ultimoConsecutivo( $data ){

      $qry = $this->db->query("SELECT count(numero) as numero FROM consecutivos WHERE (anio = {$data['anio']}) AND (iddocumento = '{$data['documento']}') ");

      return $qry->row();

    } # fin ultimoConsecutivo

    function anios(){

      $qry = $this->db->query('SELECT anio FROM consecutivos GROUP BY anio ORDER BY anio ASC');

      return $qry->result();
    } # fin anios

    function consecutivosAnio( $data ){

      $qry = $this->db->select('idconsecutivo, numero, asunto, destinatario, DATE_FORMAT( creado , "%d-%m-%Y" ) as fecha, "" as acciones')
                      ->where('anio', $data['anio'])
                      ->where('iddocumento', $data['documento'])
                      ->get('consecutivos');

         foreach( $qry->result() as $valor ){

             $update ='<a href="'. base_url('consecutivos/update/'. $valor->idconsecutivo) .'" class="dropdown-item"><span
             class="fa fa-edit"></span> Editar</a>'; 

             $acciones = '<div class="dropdown mr-3">
                        <button class="btn btn-sm btn-light" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                          <span class="fa fa-ellipsis-v"></span>
                        </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item detalle" data-id="'.$valor->idconsecutivo.'"> <span
                         class="fa fa-file-text-o"></span> Ver Detalle</button>';
                    
              if ( $this->session->userdata('ss-user') === null) 
                 $acciones .= '</div> </div>';
               else  
                $acciones .=  $update .  '</div> </div>';
               

               unset($valor->idconsecutivo);

             $valor->acciones = $acciones;    

         }               

      return $qry->result();

    } # fin consecutivosAnio


    function findConsecutivo( $data ){

       $qry = $this->db->select('c.idconsecutivo, c.idarea, CONCAT(c.numero, "-" , c.anio ) as numero, c.asunto, c.remitente, c.destinatario,a.descripcion as area, d.descripcion as documento, referencia,DATE_FORMAT( c.creado , "%d-%m-%Y" ) as creado')
                        ->where('idconsecutivo', $data)
                        ->from('consecutivos c')
                        ->join('areas a', 'c.idarea = a.idarea')
                        ->join('documentos d', 'c.iddocumento = d.iddocumento')
                       ->get();

       return $qry->row();                

    } # fin findConsecutivo
    

}

/* End of file Consecutivo_mdl.php */
