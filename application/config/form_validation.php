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
                  
        )
       
);