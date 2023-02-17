<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Pedido;
use App\Entidades\Postulacion;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;
use Illuminate\Http\Request;

include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorWebMercadoPago extends Controller
{
      public function aprobado()
      {
            $pedido=new Pedido();
            $pedido->aprobado();

            return redirect("confirmacion-compra");

      }
      public function pendiente()
      {
            $pedido=new Pedido();
            $pedido->pendiente();
            return redirect("confirmacion-compra");

      }
      public function error()
      {
            $pedido=new Pedido();
            $pedido->error;
            return redirect("confirmacion-compra");

      }

};
