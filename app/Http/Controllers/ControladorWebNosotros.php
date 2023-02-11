<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;
use Illuminate\Http\Request;

include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorWebNosotros extends Controller
{
      public function index()
      {
            return view("web.nosotros");
      }

      public function guardar(Request $request)
      {

            //define la entidad servicio
            $entidad = new Postulacion();
            $entidad->cargarDesdeRequest($request);

            if ($_FILES['archivo']["error"] === UPLOAD_ERR_OK) { //Se adjunta
                  $extension = pathinfo($_FILES['archivo']["name"], PATHINFO_EXTENSION);
                  $nombreArchivo = date("Ymdhmsi") . ".$extension";
                  $archivo = $_FILES["archivo"]["tmp_name"];
            }

            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                  move_uploaded_file($archivo, env('APP_PATH') .  "/public/files/$nombreArchivo");
                  $entidad->curriculo = $nombreArchivo;
                  //guardaelarchivo
            }
            $entidad->insertar();
            $msg["ESTADO"] = MSG_SUCCESS;
            $msg["MSG"] = OKINSERT;
            return redirect("/contacto");
      }
};
