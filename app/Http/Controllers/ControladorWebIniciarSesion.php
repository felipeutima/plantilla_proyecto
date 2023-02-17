<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;

class ControladorWebIniciarSesion extends Controller
{
    public function index()
    {       $mensaje="";

            return view("web.iniciar-sesion", compact("mensaje"));
    }
    public function ingresar(Request $request)
    {   
        $correo= $request->input("txtCorreo");
        $clave= $request->input("txtClave");
        $cliente=new Cliente();
        $cliente->obtenerPorCorreo($correo);
        if($cliente && password_verify($clave,$cliente->clave)){ //si ingresa
            Session::put("idcliente", $cliente->idcliente);
            return redirect('/takeaway');

        }else{
            $mensaje= "Credenciales Incorrectas"; 
            return view("web.iniciar-sesion", compact("mensaje"));
        }

        
    }

    public function cerrarSesion(){
        Session::put("idcliente","");//vaciamos la sesion
        return redirect("/");

    }
}