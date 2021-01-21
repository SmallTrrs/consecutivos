<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

     
     public function __construct()
     {
         parent::__construct();
         $this->load->model('usuario_mdl');
         $this->load->helper('seguridad');
         $this->load->helper('validar_usuario');      
         sesionActiva();
     }
     

    public function index(){
        
        $data['usuarios'] = $this->usuario_mdl->listUsuarios();

        $this->load->view('usuarios/usuarios', $data);
        
    } # fin index

    public function store(){
          $this->load->view('usuarios/usuario-store');          
    } # fin store


    public function update( $id = null ){

       $usuario = $this->usuario_mdl->findUsuario( $id );
       
       unset( $usuario->password );
    
       $data['usuario'] = $usuario;
      
       $this->load->view('usuarios/usuario-update', $data);      
    }  # fin update

    public function delete( $id = null ){

        $usuario = $this->usuario_mdl->findUsuario( $id );

         if ( $usuario !== null ){

             if ( $usuario->usuario === 'Administrador' )
                
                 $this->session->set_flashdata('notificacion','<script>swal("Acción Invalida", "No se puede eliminar el usuario Administrador", "info" , {buttons: "Aceptar"});</script>');

             elseif ( $usuario->usuario === $this->session->userdata('ss-user') )
                 
                  $this->session->set_flashdata('notificacion','<script>swal("Sesion Activa", "No puedes eliminarte", "info" , {buttons: "Aceptar"});</script>');

             else{

                $eliminado = $this->usuario_mdl->delete( $id );

                if ( is_array( $eliminado ) )
                  $this->session->set_flashdata('notificacion','<script>swal("Error '. $eliminado['code'].'", "Ocurrio un problema intenta nuevamente", "error" , {buttons: "Aceptar"});</script>');   
                else    
                    $this->session->set_flashdata('notificacion','<script>swal("Usuario Eliminado", "", "success" , {buttons: "Aceptar"});</script>');
             }   
               
         } else{
           $this->session->set_flashdata('notificacion','<script>swal("Usuario No Encontrado", "", "error" , {buttons: "Aceptar"});</script>');
         }
         
         redirect('usuarios','location');
                  

    } # fin delete


    public function password( $id =  null ){

        $data['usuario'] = $this->usuario_mdl->findUsuario( $id );

        $this->load->view('usuarios/usuario-password', $data);

    } # fin password

//    funciones de interaccion con base de datos 

  public function store_db(){

    $fields['nombre']   = clean_field( $this->input->post('nombre'));
    $fields['usuario']  = clean_field( $this->input->post('usuario'));
    $fields['password'] = clean_field( $this->input->post('password'));
    $fields['passconf'] = clean_field( $this->input->post('passconf'));
    $fields['activo']   = clean_field( $this->input->post('activo'));

     if ( validarUsuario( $fields, 'store') ){

         unset( $fields['passconf'] );
         $fields['idusuario'] = uniqid('AD');
         $fields['password']  = password_hash( $fields['password'] , PASSWORD_DEFAULT );

         $usuario = $this->usuario_mdl->store( $fields );

         if ( is_array( $usuario) )
           $this->session->set_flashdata('notificacion','<script>swal("Error '. $usuario['code'].' ", "Ocurrio un problema al guardar el usuario", "error" , {buttons: "Aceptar"});</script>');   
         else 
           $this->session->set_flashdata('notificacion','<script>swal("Usuario dado de alta", "", "success" , {buttons: "Aceptar"});</script>'); 

         redirect('usuarios/store','location');

     } 
      

  } # fin store_db

  public function update_db(){

    $fields['idusuario']   = clean_field( $this->input->post('idusuario'));
    $fields['nombre']      = clean_field( $this->input->post('nombre'));
    $fields['activo']      = clean_field( $this->input->post('activo'));

      if ( validarUsuario( $fields , 'update' ) ){

           $usuario = $this->usuario_mdl->update( $fields['idusuario'], $fields );

           if ( is_array( $usuario ) )
           $this->session->set_flashdata('notificacion','<script>swal("Error '. $usuario['code'].'", "Ocurrio un problema al actualizar el usuario", "error" , {buttons: "Aceptar"});</script>');   
         else 
           $this->session->set_flashdata('notificacion','<script>swal("Usuario Actualizado", "", "success" , {buttons: "Aceptar"});</script>'); 

         redirect('usuarios/update/'. $fields['idusuario'],'location');

      }


  } # fin update_db

  public function password_db(){

      $fields['idusuario']  = clean_field( $this->input->post('idusuario') ); 
      $fields['password']  = clean_field( $this->input->post('password')); 
      

       if ( $this->form_validation->run('password') === FALSE ){

            if ( $this->form_validation->error('password') )
                  $this->session->set_flashdata('err_password', $this->form_validation->error('password' ,'',''));

            if ( $this->form_validation->error('passconf') )
                  $this->session->set_flashdata('err_passconf', $this->form_validation->error('passconf' ,'',''));
                   
          $this->session->set_flashdata('password', $fields['password']);
          $this->session->set_flashdata('passconf', $this->input->post('passconf'));          
          
          redirect('usuarios/password/' . $fields['idusuario'],'location');
          
       }
       else{

              $fields['password']     =  password_hash( $fields['password'] , PASSWORD_DEFAULT );
               
              $usuario = $this->usuario_mdl->cambioPassword( $fields );

              if ( is_array( $usuario ) )
                 $this->session->set_flashdata('notificacion','<script>swal("Error '. $usuario['code'].'", "Ocurrio un problema al cambiar el passowrd", "error" , {buttons: "Aceptar"});</script>');    
              else 
                $this->session->set_flashdata('notificacion','<script>swal("Password Cambiado", "", "success" , {buttons: "Aceptar"});</script>'); 

              redirect('usuarios/password/' . $fields['idusuario'], 'location'); 

       }

  }


}

/* End of file Usuarios.php */
