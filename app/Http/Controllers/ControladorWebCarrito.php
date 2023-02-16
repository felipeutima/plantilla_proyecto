<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\CarritoProducto;
use App\Entidades\Pedido;
use App\Entidades\PedidoProducto;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer\Exception;

class ControladorWebCarrito extends Controller
{
    public function index()
    {
        $sucursal= new Sucursal();
        $aSucursales=$sucursal->obtenerTodos();
        
        $idcliente =Session::get("idcliente");
        $cantidad_carrito="";

        //para mostrar el numero en el carrito de la barra de navegación
        if($idcliente){
            $carritoProducto= new CarritoProducto();
            $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
        }

        //traer productos del carrito para la vista de carrito
        $carritoProducto=new CarritoProducto();
        $aCarrito= $carritoProducto->obtenerPorCliente($idcliente);

            return view("web.carrito", compact("cantidad_carrito", "aSucursales", "aCarrito"));
    }
    public function confirmarCompra(Request $request){

        $idcliente =Session::get("idcliente");
        //pago por
        $medioPago= $request->input("lstPago");


        //alista el pedido
        $pedido=new Pedido();
        $pedido->fecha=date("Y-m-d H:i");
        $pedido->descripcion=$request->input("txtDescripcion");
        $pedido->fk_idcliente=$idcliente;
        $pedido->total=$request->input("txtTotal");
        $pedido->fk_idsucursal=$request->input("lstSucursal");
        $pedido->fk_idestado=1 ;//pendiente
        $pedido->insertar() ;//pendiente

        
           //traer productos del carrito
           $carritoProducto=new CarritoProducto();
           $aCarrito= $carritoProducto->obtenerPorCliente($idcliente);

        //insertando los productos en el pedido
        $pedidoProducto=new PedidoProducto();
        foreach($aCarrito as $carrito){
            $pedidoProducto->fk_idproducto=$carrito->fk_idproducto;
            $pedidoProducto->fk_idpedido=$pedido->idpedido;
            $pedidoProducto->cantidad=$carrito->cantidad;
            $pedidoProducto->preciounitario=$carrito->precio;
            $pedidoProducto->total=$carrito->precio*$carrito->cantidad;
            $pedidoProducto->insertar();
        }

        //eliminar el carrito y carrito con productos

        $carrito =new Carrito();
        $carritoCliente=$carrito->obtenerPorCliente($idcliente);
        $carritoProducto->eliminarPorCarrito($carritoCliente->idcarrito);
        
        $carrito->eliminarPorCliente($idcliente);

     
        return redirect("/confirmar-compra");

    }


}