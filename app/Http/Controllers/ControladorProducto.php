<?php

namespace App\Http\Controllers;

use App\Entidades\Categoria;
use Illuminate\Http\Request;

use App\Entidades\Producto;
use App\Http\Controllers\Exception;
use App\Entidades\Pedido;

include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorProducto extends Controller
{ //para identificar como controlador

      public function nuevo()
      {
            $titulo = "Nuevo Producto";

            $producto = new Producto();
            $categoria = new Categoria();
            $aCategoria = $categoria->obtenerTodos();

            return view("sistema.producto-nuevo", compact("titulo", "aCategoria", "producto")); //indico la vista y compact lleva la variable
      }
      public function index()
      {
            return view("sistema.producto-listar");
      }

      public function guardar(Request $request)
      {
            try {
                  //define la entidad servicio

                  $titulo = "Modificar Producto";
                  $entidad = new Producto;
                  $entidad->cargarDesdeRequest($request);

                  if ($_FILES['archivo']["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
                        $extension = pathinfo($_FILES['archivo']["name"], PATHINFO_EXTENSION);
                        $nombreArchivo = date("Ymdhmsi") . ".$extension";
                        $archivo = $_FILES["archivo"]["tmp_name"];
                  }


                  //validaciones del formulario
                  if ($entidad->nombre == "" || $entidad->cantidad == "" || $entidad->precio == "" || $entidad->fk_idcategoria == "") {
                        $msg["ESTADO"] = MSG_ERROR;
                        $msg["MSG"] = "Inserte todos los datos obligatorios";
                  } else {
                        if ($_POST["id"] > 0) {

                              $productAnt = new Producto();
                              $productAnt->obtenerPorId($entidad->idproducto);
                              if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                                    //Eliminar imagen anterior
                                    @unlink(env('APP_PATH') . "/public/files/$productAnt->imagen");
                                    move_uploaded_file($archivo, env('APP_PATH') .  "/public/files/$nombreArchivo");
                                    $entidad->imagen =$nombreArchivo;
                              } else {
                                    $entidad->imagen = $productAnt->imagen;
                              }

                              $entidad->guardar(); //actualizar
                              $msg["ESTADO"] = MSG_SUCCESS;
                              $msg["MSG"] = OKINSERT;
                        } else {
                              if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                                    move_uploaded_file($archivo, env('APP_PATH') .  "/public/files/$nombreArchivo");
                                    $entidad->imagen = $nombreArchivo;
                                    //guardaelarchivo
                              }
                              $entidad->insertar();
                              $msg["ESTADO"] = MSG_SUCCESS;
                              $msg["MSG"] = OKINSERT;
                        }
                        $_POST["id"] = $entidad->idproducto;

                        return view("sistema.producto-listar", compact('titulo', 'msg'));
                  }
            } catch (Exception $e) {
                  $msg["ESTADO"] = MSG_ERROR;
                  $msg["MSG"] = ERRORINSERT;
            }

            $id = $entidad->idproducto;
            $producto = new Producto;
            //para obtener los datos del cliente dentro del formulario
            if ($id > 0) {
                  $producto->obtenerPorId($id);
            }


            return view("sistema.producto-listar", compact('titulo', 'msg', 'producto')) . '?id=' . $producto->idproducto;
      }
      public function cargarGrilla()
      {

            $request = $_REQUEST;

            $entidad = new Producto();
            $aProductos = $entidad->obtenerFiltrado();


            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];

            for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {


                  $row = array();
                  $row[] = '<a href="/admin/producto/' . $aProductos[$i]->idproducto . '">BOTON</a>';
                  $row[] = $aProductos[$i]->nombre;
                  $row[] = $aProductos[$i]->cantidad;
                  $row[] = $aProductos[$i]->precio;
                  $row[] = '<img src="/files/' . $aProductos[$i]->imagen . '" class="img-thumbnail">';
                  $row[] = $aProductos[$i]->categoria;
                  $cont++;
                  $data[] = $row;
            };
            $json_data = array(
                  "draw" => intval($request['draw']),
                  "recordsTotal" => count($aProductos),
                  "recordsFiltered" => count($aProductos),
                  "data" => $data
            );
            return json_encode($json_data);
      }

      public function editar($id)
      {
            $titulo = "Edicion de Producto";
            $entidad = new Producto();
            $producto = $entidad->obtenerPorId($id);

            $categoria = new Categoria();
            $aCategoria = $categoria->obtenerTodos();
            return view("sistema.producto-nuevo", compact('titulo', 'producto', "aCategoria"));
      }

      public function eliminar(Request $request)
      {
            $id = $request->input('id');
        
            $entidad = new Producto();
            $entidad->idproducto = $id;
            $entidad->eliminar();
            $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
            $aResultado["mensaje"] = "Eliminado correctamente ";

            echo json_encode($aResultado);
      }
}
