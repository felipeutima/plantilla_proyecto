<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;

use Session;

class ControladorWebIniciarSesion extends Controller
{
    public function index()
    {

            return view("web.iniciar-sesion");
    }
}