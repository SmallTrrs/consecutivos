<?php

$config = array(
        
        'regAdmin' => array(
                array(
                        'field' => 'nombre',
                        'rules' => 'required',
                        'errors' => [
                             'required' => 'El nombre es requerido'    
                        ]
                ),
                array(
                        'field' => 'password',
                        'rules' => 'required|min_length[8]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres'
                        ]
                ),
                array(
                        'field' => 'passconf',
                        'rules' => 'required|min_length[8]|matches[password]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres',
                                'matches' => 'Los passwords no coinciden'
                        ]
                )
               
        ),
        'login' => array(
                   
                array(
                  'field' => 'usuario',
                  'rules' => 'required',
                  'errors' => [
                          'required' => 'El campo usuario es requerido'
                  ]
                  ),
                array(
                  'field' => 'password',
                  'rules' => 'required',
                  'errors' => [
                          'required' => 'El campo password es requerido'
                  ]
                  )
                  
                  ),
                  'unico' => array(
                   
                        array(
                          'field' => 'descripcion',
                          'rules' => 'required',
                          'errors' => [
                                  'required' => 'El campo es requerido'
                          ]
                          )                      
                          
        ),
        'usuario' => array(
                array(
                        'field' => 'nombre',
                        'rules' => 'required',
                        'errors' => [
                             'required' => 'El nombre es requerido'    
                        ]
                ),
                array(
                        'field' => 'usuario',
                        'rules' => 'required',
                        'errors' => [
                             'required' => 'El usuario es requerido'    
                        ]
                ),
                array(
                        'field' => 'password',
                        'rules' => 'required|min_length[8]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres'
                        ]
                ),
                array(
                        'field' => 'passconf',
                        'rules' => 'required|min_length[8]|matches[password]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres',
                                'matches' => 'Los passwords no coinciden'
                        ]
                )
               
        ),

        'password' => array(
                
                array(
                        'field' => 'password',
                        'rules' => 'required|min_length[8]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres'
                        ]
                ),
                array(
                        'field' => 'passconf',
                        'rules' => 'required|min_length[8]|matches[password]',
                        'errors' => [
                                'required' => 'El password es requerido',
                                'min_length' => 'El password debe contener al menos 8 caracteres',
                                'matches' => 'Los passwords no coinciden'
                        ]
                )

       ),
       'token' => array(

              array(
                      'field' => 'equipo',
                      'rules' => 'required',
                      'errors' => [
                              'required' => 'El campo es requerido',                             
                      ]
              ),

        ),
        'consecutivo' => array(

                array(
                        'field' => 'asunto',
                        'rules' => 'required',
                        'errors' => [
                                'required' => 'El campo asunto es requerido',                             
                        ]
                ),
                array(
                        'field' => 'remitente',
                        'rules' => 'required',
                        'errors' => [
                                'required' => 'El campo remitente es requerido',                             
                        ]
                ),
                array(
                        'field' => 'destinatario',
                        'rules' => 'required',
                        'errors' => [
                                'required' => 'El campo destinatario es requerido',                             
                        ]
                ),
  
         )  
       
);