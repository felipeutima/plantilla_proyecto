<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;

use Session;

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {
            $idcliente=Session::get("idcliente");
            $cliente=new Cliente();
            $cliente->obtenerPorId($idcliente);
            return view("web.mi-cuenta", compact("idcliente", "cliente"));
    }
}