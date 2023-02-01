<?php

namespace App\Http\Controllers;

class ControladorCliente extends Controller{//para identificar como controlador

      public function nuevo(){
            $titulo="Nuevo Cliente";
            return view("sistema.cliente-nuevo", compact("titulo"));//indico la vista y compact lleva la variable
      }
      public function index(){
            return view("sistema.cliente-listar");
      }


} 