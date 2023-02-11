<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebRecuperarClave extends Controller
{
    public function index()
    {
            return view("web.recuperar-contraseña");
    }
}
