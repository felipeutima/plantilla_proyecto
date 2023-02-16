<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sucursal;
use Session;

class ControladorWebHome extends Controller
{
    public function index()
    {
        $sucursal= new Sucursal();
        $aSucursales=$sucursal->obtenerTodos();
        
        $idcliente =Session::get("idcliente");
        $cantidad_carrito="";
        if($idcliente){
            $carritoProducto= new CarritoProducto();
            $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
        }

            return view("web.index",compact("aSucursales","cantidad_carrito"));
    }
}
