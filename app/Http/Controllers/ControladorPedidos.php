<?php

namespace App\Http\Controllers;

class ControladorPedidos extends Controller{//para identificar como controlador


      public function index(){
            return view("sistema.pedido-listar");
      }
      public function nuevo(){
            $titulo="Nuevo Pedido";
            return view("sistema.pedido-nuevo", compact("titulo"));
      }


} 