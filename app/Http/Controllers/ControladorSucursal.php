<?php

namespace App\Http\Controllers;

class ControladorSucursal extends Controller{//para identificar como controlador

      public function nuevo(){
            $titulo="Nueva Sucursal";
            return view("sistema.sucursal-nuevo", compact("titulo"));//indico la vista y compact lleva la variable
      }
      public function index(){
            return view("sistema.sucursal-listar");
      }


} 