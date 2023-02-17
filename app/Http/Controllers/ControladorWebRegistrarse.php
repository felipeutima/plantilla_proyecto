<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;
use Illuminate\Http\Request;
class ControladorWebRegistrarse extends Controller
{
    public function index()
    {
            return view("web.registrarse");
    }

    public function guardar(Request $request)
    {

          //define la entidad servicio
          $entidad = new Cliente();
          $entidad->cargarDesdeRequest($request);
          $entidad->insertar();
          return redirect("/contacto");
    }
}
