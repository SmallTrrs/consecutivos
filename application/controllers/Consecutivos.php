<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consecutivos extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('seguridad');
        $this->load->model('consecutivo_mdl');
    }
    

    public function update( $id = null ){
       
      sesionActiva();

      $this->load->model('areas_mdl');
         
      $data['consecutivo'] = $this->consecutivo_mdl->findConsecutivo( $id );
      $data['areas']       = $this->areas_mdl->listAreas();

      $this->load->view('consecutivos/consecutivo-update', $data);       

    }

    public function generarConsecutivo(){
      
       $data['idconsecutivo'] = uniqid('CS');
       $data['asunto'] = clean_field( strtoupper($this->input->post('asunto')) );
       $data['remitente'] = clean_field( strtoupper($this->input->post('remitente')) );
       $data['destinatario'] = clean_field( strtoupper($this->input->post('destinatario')) );
       $data['referencia'] = clean_field( strtoupper($this->input->post('referencia') === '' ? '- - - - - - - -' : $this->input->post('referencia')));
       $data['iddocumento'] = clean_field( $this->input->post('documento') );
       $data['idarea'] = clean_field( $this->input->post('area') );
       $data['anio'] = date('Y');
       $data['numero'] = $this->consecutivo_mdl->ultimoConsecutivo(['anio' => $data['anio'] , 'documento' => $data['iddocumento']])->numero + 1;

        $numero = $this->consecutivo_mdl->store( $data);

          if ( is_array( $numero ) ){
            $consecutivo = ['status' => 'false']; 
            echo  json_encode( $consecutivo );            
          }
          else{
            $consecutivo = ['status' => 'true','numero' => $data['numero'], "id" => $data['idconsecutivo']]; 
            echo json_encode( $consecutivo );
          } 
          
    }  # fin generarConsecutivo

    public function update_ajax(){
       
      $data['idconsecutivo'] = clean_field( strtoupper($this->input->post('id')) );
      $data['asunto'] = clean_field( strtoupper($this->input->post('asunto')) );
      $data['remitente'] = clean_field( strtoupper($this->input->post('remitente')) );
      $data['destinatario'] = clean_field( strtoupper($this->input->post('destinatario')) );
      $data['referencia'] = clean_field(strtoupper( $this->input->post('referencia') === '' ? '- - - - - - - -' : $this->input->post('referencia') ));
      $data['idarea'] = clean_field( $this->input->post('area') );

      $consecutivo = $this->consecutivo_mdl->update( $data );

       if ( is_array( $consecutivo ) )
          echo json_encode(['status' => 'false']);
       else   
          echo json_encode(['status' => 'true']);

    } # fin update_db

    public function update_db(){

         sesionActiva();
         
        $this->load->helper('validar_consecutivo');
        
        $fields['idconsecutivo'] = clean_field( $this->input->post('idconsecutivo'));
        $fields['asunto'] = clean_field( strtoupper( $this->input->post('asunto')));
        $fields['remitente'] = clean_field(strtoupper( $this->input->post('remitente')));
        $fields['destinatario'] = clean_field( strtoupper( $this->input->post('destinatario')));
        $fields['referencia'] = clean_field(strtoupper( $this->input->post('referencia')));
        $fields['idarea'] = clean_field( $this->input->post('area'));

        if ( validarConsecutivo( $fields ) ){
        
          
          if ( $fields['referencia'] === '' )
              $fields['referencia'] = '- - - - - - - -';
          
              $consecutivo = $this->consecutivo_mdl->update( $fields );

              if ( is_array( $consecutivo ) )
                $this->session->set_flashdata('notificacion','<script>swal("Error '. $consecutivo['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');                   
              else   
                 $this->session->set_flashdata('notificacion','<script>swal("Consecutivo Actualizado", "", "success" , {buttons: "Aceptar"});</script>');
                    
             redirect('consecutivos/update/' . $fields['idconsecutivo'],'location');

        } 
      
    } # fin update_db

    public function detalle(){

      $id = clean_field($this->input->post('id'));
      $consecutivo = $this->consecutivo_mdl->findConsecutivo( $id );

      unset( $consecutivo->idconsecutivo );
      unset( $consecutivo->idarea );
      
      echo json_encode( $consecutivo );      

    }

}

/* End of file Consecutivos.php */
