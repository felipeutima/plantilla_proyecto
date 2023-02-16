<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;

use Illuminate\Http\Request;
use Session;
use PHPMailer\PHPMailer\PHPMailer;

class ControladorWebConfirmarCompra extends Controller
{
    public function index()
    {
        $idcliente =Session::get("idcliente");
        $cantidad_carrito="";
        if($idcliente){
            $carritoProducto= new CarritoProducto();
            $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
        }

            return view("web.confirmacion-compra", compact("cantidad_carrito"));
    }
}