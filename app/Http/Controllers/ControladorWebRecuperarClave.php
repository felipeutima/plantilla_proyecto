<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Contracts\View\View;
use Session;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer\Exception;


class ControladorWebRecuperarClave extends Controller
{
    public function index()
    {

            return view("web.recuperar-contraseña");
    }
    public function recuperarClave(Request $request)
    {
        $correo=$request->input("txtCorreo");
        $clave=rand(1000,9999);
        $cliente=new Cliente();
        $cliente->obtenerPorCorreo($correo);

        if ($cliente){
            $cliente->clave= password_hash($clave, PASSWORD_DEFAULT) ;
            
            $cliente->guardar();
                        
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
        $mail->addAddress($correo); //Dirección para
        //$mail->addReplyTo($replyTo); //Dirección de reply no-reply
        //$mail->addBCC($copiaOculta); //Dirección de CCO
        //Contenido del mail
        $mail->isHTML(true);
        $mail->Subject = "Recuperación de clave";
        $mail->Body = "la clave de recuperación es: ".$clave;
        //$mail->send();
        }

            return view("web.recuperar-contraseña", compact("clave"));
    }
}
