<?php

namespace App\Http\Controllers;

class ControladorPostulacion extends Controller{//para identificar como controlador


      public function index(){
            return view("sistema.postulacion-listar");
      }
      public function nuevo(){
            $titulo="Nueva Postulacion";
            return view("sistema.postulacion-nuevo", compact("titulo"));
      }


} 