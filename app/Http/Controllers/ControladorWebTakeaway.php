<?php

namespace App\Http\Controllers;

use App\Entidades\Producto;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebTakeaway extends Controller
{
    public function index()
    {
        $producto=new Producto();
        $aProductos=$producto->obtenerTodos();
            return view("web.takeaway", compact("aProductos"));
    }
}
