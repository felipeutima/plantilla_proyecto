<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\CarritoProducto;
use App\Entidades\Producto;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Session;

class ControladorWebTakeaway extends Controller
{
    public function index()
    {
        //traer productos
        $producto = new Producto();
        $aProductos = $producto->obtenerTodos();

        //traer cantidad de carrito

        $idcliente =Session::get("idcliente");
        $cantidad_carrito="";
        if($idcliente){
            $carritoProducto= new CarritoProducto();
            $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
        }



        return view("web.takeaway", compact("aProductos","cantidad_carrito"));
    }
    public function agregar(Request $request)
    {
        $idcliente = Session::get("idcliente");
        $cantidad = $request->input("txtCantidad");
        $idproducto = $request->input("txtProducto");

        $producto = new Producto();
        $aProductos = $producto->obtenerTodos();


        if ($idcliente) { //si existe la sesion

            if ($cantidad > 0) {
                $carrito = new Carrito();
                $carrito->obtenerPorCliente($idcliente);
                $idcarrito = "";

                if ($carrito->idcarrito > 0) {

                    //si existe le inserto el id de carrito en la variable 
                    $idcarrito = $carrito->idcarrito;
                } else {
                    //sino inserto otro carro nuevo
                    $carrito->fk_idcliente = $idcliente;
                    $carrito->insertar();
                    //y obtiene el id del nuevo carrito
                    $carrito->obtenerPorCliente($idcliente);
                    $idcarrito = $carrito->idcarrito;
                }

                $producto = new Producto();
                $producto->obtenerPorId($idproducto);

                if ($cantidad <= $producto->cantidad) {

                    $carritoProducto = new CarritoProducto();
                    $carritoProducto->fk_idcarrito = $idcarrito;
                    $carritoProducto->fk_idproducto = $idproducto;
                    $carritoProducto->cantidad = $cantidad;
                    $carritoProducto->insertar();
                    return redirect("/takeaway");
                } else {
                    $mensaje = "No hay existencias del producto seleccionado";
                    return view("web.takeaway", compact("aProductos", "mensaje"));
                }
            } else {
                $mensaje = "Debe Seleccionar la cantidad del producto que desea adquirir";
                return view("web.takeaway", compact("aProductos", "mensaje"));
            }
        } else {
            return redirect("/iniciar-sesion");
        }
    }
}
