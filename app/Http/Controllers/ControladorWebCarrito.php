<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\CarritoProducto;
use App\Entidades\Cliente;
use App\Entidades\Pedido;
use App\Entidades\PedidoProducto;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Session;

use MercadoPago\item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

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

        if($medioPago==2){
            $access_token="111";

        SDK::setClientId(config("payment-methods.mercadopago.client"));
        SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
        //SDK::setAccessToken($access_token); //Es el token de la cuenta de MP donde se deposita el dinero
        //Armado del producto 'item'
        $item = new Item();
        $item->id = "1234";
        $item->title = "Burger SRL";
        $item->category_id= "products";
        $item->quantity = 1;
        $item->unit_price = $pedido->total;
        $item->currency_id = "COP"; //"COP"

        $preference = new Preference();
        $preference->items = array($item);
        //Datos del comprador

        $cliente=new Cliente();
        $cliente->obtenerPorId($idcliente);
        $payer = new Payer();
        $payer->name = $cliente->nombre;
        $payer->surname= $cliente->apellido;
        $payer->email = $cliente->correo;
        $payer->date_created== date('Y-m-d H:m:s');
        $payer->identification= array(
            "type" => "CUIT",
            "number" => $cliente->dni
        );
        $preference->payer== $payer;

        //URL de configuración para indicarle a MP
        $preference->back_urls=[
        "success" => "http://127.0.0.1:8000/mercado-pago/aprobado/". $pedido->idpedido,
        "pending" => "http://127.0.0.1:8000/mercado-pago/pendiente/" .$pedido->idpedido,
        "failure" => "http://127.0.0.1:8000/mercado-pago/error/". $pedido->idpedido,
        ];
        $preference->payment_methods = array("installments" => 6);
        $preference->auto_return = "all";
        $preference->notification_url = "";  
        //$preference->save(); //Ejecuta la transacción



    
        }else{
            return redirect("/confirmar-compra");


        }
        

    }


}