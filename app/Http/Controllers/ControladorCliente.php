<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entidades\Cliente;
use App\Entidades\Pedido;
use App\Http\Controllers\Exception;

include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorCliente extends Controller
{ //para identificar como controlador

      public function nuevo()
      {
            $titulo = "Nuevo Cliente";
            $cliente = new Cliente();
            return view("sistema.cliente-nuevo", compact("titulo", "cliente")); //indico la vista y compact lleva la variable
      }
      public function index()
      {
            return view("sistema.cliente-listar");
      }

      public function cargarGrilla()
      {

            $request = $_REQUEST;

            $entidad = new Cliente();
            $aClientes = $entidad->obtenerFiltrado();


            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];

            for ($i = $inicio; $i < count($aClientes) && $cont < $registros_por_pagina; $i++) {


                  $row = array();
                  $row[] = '<a href="/admin/cliente/' . $aClientes[$i]->idcliente . '">BOTON</a>';
                  $row[] = $aClientes[$i]->nombre;
                  $row[] = $aClientes[$i]->apellido;
                  $row[] = $aClientes[$i]->celular;
                  $row[] = $aClientes[$i]->correo;
                  $row[] = $aClientes[$i]->dni;
                  $cont++;
                  $data[] = $row;
            };
            $json_data = array(
                  "draw" => intval($request['draw']),
                  "recordsTotal" => count($aClientes),
                  "recordsFiltered" => count($aClientes),
                  "data" => $data
            );
            return json_encode($json_data);
      }

      public function guardar(Request $request)
      {
            try {
                  //define la entidad servicio

                  $titulo = "Modificar Cliente";
                  $entidad = new Cliente();
                  $entidad->cargarDesdeRequest($request);


                  //validaciones del formulario
                  if ($entidad->nombre == "" || $entidad->apellido == "" || $entidad->correo == "" || $entidad->dni == "" || $entidad->celular == "" || $entidad->clave == "") {
                        $msg["ESTADO"] = MSG_ERROR;
                        $msg["MSG"] = "Inserte todos los datos obligatorios";
                  } else {
                        if ($_POST["id"] > 0) {
                              $entidad->guardar(); //actualizar
                              $msg["ESTADO"] = MSG_SUCCESS;
                              $msg["MSG"] = OKINSERT;
                        } else {
                              $entidad->insertar();
                              $msg["ESTADO"] = MSG_SUCCESS;
                              $msg["MSG"] = OKINSERT;
                        }
                        $_POST["id"] = $entidad->idcliente;
                        return view("sistema.cliente-listar", compact('titulo', 'msg'));
                  }
            } catch (Exception $e) {
                  $msg["ESTADO"] = MSG_ERROR;
                  $msg["MSG"] = ERRORINSERT;
            }

            $id = $entidad->idcliente;
            $cliente = new Cliente;
            //para obtener los datos del cliente dentro del formulario
            if ($id > 0) {
                  $cliente->obtenerPorId($id);
            }
            return view("sistema.cliente-listar", compact('titulo', 'msg', 'cliente')) . '?id=' . $cliente->idcliente;
      }

      public function editar($id)
      {
            $titulo = "Edicion de Cliente";
            $entidad = new Cliente();
            $cliente = $entidad->obtenerPorId($id);
            return view("sistema.cliente-nuevo", compact('titulo', 'cliente'));
      }

      public function eliminar(Request $request)
      {
            $id = $request->input('id');
        

            $pedido=new Pedido();
            $aPedidos=$pedido->obtenerPorCliente($id);

            if(count($aPedidos)==0){
                  $entidad = new Cliente();
                  $entidad->idcliente = $id;
                  $entidad->eliminar();
                  $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
                  $aResultado["mensaje"] = "Eliminado correctamente ";
            } else{
                  $aResultado["err"] = EXIT_FAILURE;
                  $aResultado["mensaje"] = "No se puede eliminar cliente con pedidos asociados";
            }

            echo json_encode($aResultado);

      }
}
