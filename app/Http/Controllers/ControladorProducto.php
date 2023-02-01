<?php

namespace App\Http\Controllers;

class ControladorProducto extends Controller{//para identificar como controlador

      public function nuevo(){
            $titulo="Nuevo Producto";
            return view("sistema.producto-nuevo", compact("titulo"));//indico la vista y compact lleva la variable
      }
      public function index(){
            return view("sistema.producto-listar");
      }


} 