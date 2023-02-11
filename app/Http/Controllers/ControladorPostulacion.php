<?php

namespace App\Http\Controllers;
use App\Entidades\Postulacion;
use Illuminate\Http\Request;
include_once app_path() . '/start/constants.php'; //para incluir las constantes 
class ControladorPostulacion extends Controller{//para identificar como controlador


      public function index(){
            return view("sistema.postulacion-listar");
      }
      public function nuevo(){
            $titulo="Nueva Postulacion";
            $postulacion=new Postulacion();

            return view("sistema.postulacion-nuevo", compact("titulo","postulacion"));
      }
      public function cargarGrilla(){
   
            $request=$_REQUEST;
      
            $entidad=new Postulacion();
            $aPostulaciones=$entidad->obtenerFiltrado();

      
            $data=array();
            $cont=0;
      
            $inicio=$request['start'];
            $registros_por_pagina= $request['length'];
      
            for ($i = $inicio; $i < count($aPostulaciones) && $cont < $registros_por_pagina; $i++){
                  
      
                $row=array();
                $row[]='<a href="/admin/postulacion/'. $aPostulaciones[$i]->idpostulacion . '">BOTON</a>';
                $row[]=$aPostulaciones[$i] ->nombre;
                $row[]=$aPostulaciones[$i] ->apellido;
                $row[]=$aPostulaciones[$i] ->celular;
                $row[]=$aPostulaciones[$i] ->correo;
                $row[]='<a href="/files/'.$aPostulaciones[$i] ->curriculo.'" target="_blank">Ver Curriculo</a>';
                $cont++;
                $data[]=$row; 
      
            };
            $json_data=array(
                "draw"=>intval($request['draw']),
                "recordsTotal"=> count($aPostulaciones),
                "recordsFiltered"=> count($aPostulaciones),
                "data"=> $data      
            );
            return json_encode($json_data);
        }
      
        public function guardar(Request $request)
        {
              try {
                    //define la entidad servicio
  
                    $titulo = "Modificar Postulacion";
                    $entidad = new Postulacion();
                    $entidad->cargarDesdeRequest($request);

                    if ($_FILES['archivo']["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
                        $extension = pathinfo($_FILES['archivo']["name"], PATHINFO_EXTENSION);
                        $nombreArchivo = date("Ymdhmsi") . ".$extension";
                        $archivo = $_FILES["archivo"]["tmp_name"];
                  }
             
               
  
                    //validaciones del formulario
                    if ($entidad->nombre == "" || $entidad->apellido == "" || $entidad->celular == "" || $entidad->correo == "") {
                          $msg["ESTADO"] = MSG_ERROR;
                          $msg["MSG"] = "Inserte todos los datos obligatorios";
                    } else {
                          if ($_POST["id"] > 0) {
                              $postulacionAnt = new Postulacion();
                              $postulacionAnt->obtenerPorId($entidad->idproducto);
                              if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                                    //Eliminar imagen anterior
                                    @unlink(env('APP_PATH') . "/public/files/$postulacionAnt->curriculo");
                                    move_uploaded_file($archivo, env('APP_PATH') .  "/public/files/$nombreArchivo");
                                    $entidad->curriculo =$nombreArchivo;
                              } else {
                                    $entidad->curriculo = $postulacionAnt->imagen;
                              }

                                $entidad->guardar(); //actualizar
                                $msg["ESTADO"] = MSG_SUCCESS;
                                $msg["MSG"] = OKINSERT;
                          } else {
                              if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                                    move_uploaded_file($archivo, env('APP_PATH') .  "/public/files/$nombreArchivo");
                                    $entidad->curriculo = $nombreArchivo;
                                    //guardaelarchivo
                              }
                                $entidad->insertar();
                                $msg["ESTADO"] = MSG_SUCCESS;
                                $msg["MSG"] = OKINSERT;
                          }
                          $_POST["id"] = $entidad->idpostulacion;
                          return view("sistema.postulacion-listar", compact('titulo', 'msg'));
                    }
              } catch (Exception $e) {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = ERRORINSERT;
              }
  
              $id= $entidad->idpostulacion;
              $postulacion=new Postulacion();
              //para obtener los datos del cliente dentro del formulario
              if($id>0){
                    $postulacion->obtenerPorId($id);
              }
              
  
              return view("sistema.postulacion-listar", compact('titulo', 'msg', 'postulacion')). '?id='.$postulacion->idpostulacion;
        }
        
        public function editar($id){
            $titulo="Edicion de Postulacion";
            $entidad= new Postulacion();
            $postulacion=$entidad->obtenerPorId($id);
            return view("sistema.postulacion-nuevo", compact('titulo', 'postulacion'));
        }

        
        public function eliminar(Request $request)
        {
              $id = $request->input('id');
          
              $entidad = new Postulacion();
              $entidad->idpostulacion = $id;

                 //unlink de archivo
            $postulacionAnt = new Postulacion();
            $postulacionAnt->obtenerPorId($id);

            @unlink(env('APP_PATH') . "/public/files/$postulacionAnt->imagen");

              $entidad->eliminar();
              $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
              $aResultado["mensaje"] = "Eliminado correctamente ";
  
              echo json_encode($aResultado);
  
        }

        

} 