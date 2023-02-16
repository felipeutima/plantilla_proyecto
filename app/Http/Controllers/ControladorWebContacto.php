<?php

namespace App\Http\Controllers;

use App\Entidades\CarritoProducto;

use Illuminate\Http\Request;
use Session;
use PHPMailer\PHPMailer\PHPMailer;

class ControladorWebContacto extends Controller
{
    public function index()
    {
        $idcliente =Session::get("idcliente");
        $cantidad_carrito="";
        if($idcliente){
            $carritoProducto= new CarritoProducto();
            $cantidad_carrito=$carritoProducto->obtenerCantidadPorCliente($idcliente);
        }

            return view("web.contacto", compact("cantidad_carrito"));
    }

    public function enviarContacto(Request $request){

        $nombre= $request->input("txtNombre");
        $correo= $request->input("txtCorreo");
        $celular= $request->input("txtCelular");
        $mensaje= $request->input("txtMensaje");
        //Instancia y configuraciones de PHPMailer
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host= env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME1');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port= env('MAIL_PORT');

        //Destinatarios
        $mail->setFrom(env('MAIL_FROM_ADDRESS')). env('MAIL_FROM_NAME1'); //Dirección desde
        $mail->addAddress('MAIL_FROM_ADDRESS'); //Dirección para
        //$mail->addReplyTo($replyTo); //Dirección de reply no-reply
        //$mail->addBCC($copiaOculta); //Dirección de CCO
        //Contenido del mail
        $mail->isHTML(true);
        $mail->Subject = "Contacto por:".$nombre;
        $mail->Body = $mensaje. "numero de celular: ".$celular ." ". $correo ;
        //$mail->send();
        $mensaje="Enviado Correctamente";


        return view("web.contacto", compact("mensaje"));
        
    }

}