<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;
use App\Entidades\Cliente;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;
use Session;

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {
            $idcliente=Session::get("idcliente");
            $cliente=new Cliente();
            $cliente->obtenerPorId($idcliente);

            $idcliente =Session::get("idcliente");
            $cantidad_carrito="";
            if($idcliente){
                $carritoProducto= new CarritoProducto();
                $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
            }
    
            return view("web.mi-cuenta", compact("idcliente", "cliente", "cantidad_carrito"));
    }

    public function actualizar(Request $request)
    {
            $idcliente=Session::get("idcliente");
            $cliente=new Cliente();
            $cliente->obtenerPorId($idcliente);

            $cliente->nombre = $request->input('txtNombre');
            $cliente->apellido = $request->input('txtApellido');
            $cliente->dni = $request->input('txtDni');
            $cliente->celular = $request->input('txtCelular');
            $cliente->correo = $request->input('txtCorreo');
            $cliente->guardar();

            $mensaje="Datos actualizados Correctamente";
            return view("web.mi-cuenta", compact("idcliente", "cliente", "mensaje"));
    }
    


}