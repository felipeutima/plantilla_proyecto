<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Pedido;
use App\Entidades\Sucursal;
use App\Entidades\Estado;
use Illuminate\Http\Request;
include_once app_path() . '/start/constants.php'; //para incluir las constantes 
class ControladorPedidos extends Controller{//para identificar como controlador


      public function index(){
            return view("sistema.pedido-listar");
      }
      public function nuevo(){
            $titulo="Nuevo Pedido";

            $sucursal=new Sucursal();
            $aSucursal=$sucursal->obtenerTodos();

            $cliente=new Cliente();
            $aClientes=$cliente->obtenerTodos();
            

            $estado=new Estado();
            $aEstados=$estado->obtenerTodos();

            $pedido=new Pedido;
           
            return view("sistema.pedido-nuevo", compact("titulo", "aSucursal","aClientes", "aEstados",  "pedido"));
      }
      public function guardar(Request $request)
      {
            try {
                  //define la entidad servicio

                  $titulo = "Modificar Pedido";
                  $entidad = new Pedido();
                  $entidad->cargarDesdeRequest($request);
             

                  //validaciones del formulario
                  if ($entidad->fecha == "" || $entidad->descripcion == "" || $entidad->total == "" || $entidad->fk_idsucursal == "" || $entidad->fk_idcliente == "" || $entidad->fk_idestado == "") {
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
                        $_POST["id"] = $entidad->idpedido;
                        return view("sistema.pedido-listar", compact('titulo', 'msg'));
                  }
            } catch (Exception $e) {
                  $msg["ESTADO"] = MSG_ERROR;
                  $msg["MSG"] = ERRORINSERT;
            }

            $id= $entidad->idpedido;
            $pedido=new Pedido;
            //para obtener los datos del pedido dentro del formulario
            if($id>0){
                  $pedido->obtenerPorId($id);
            }
            return view("sistema.pedido-listar", compact('titulo', 'msg', 'pedido')). '?id='.$pedido->idpedido;
      }
      
      public function cargarGrilla(){
   
            $request=$_REQUEST;
      
            $entidad=new Pedido();
            $aPedidos=$entidad->obtenerFiltrado();
       
      
            $data=array();
            $cont=0;
      
            $inicio=$request['start'];
            $registros_por_pagina= $request['length'];
      
            for ($i = $inicio; $i < count($aPedidos) && $cont < $registros_por_pagina; $i++){
                  
      
                $row=array();
                $row[]='<a href="/admin/pedido/'. $aPedidos[$i]->idpedido . '">BOTON</a>';
                $row[]=$aPedidos[$i] ->fecha;
                $row[]=$aPedidos[$i] ->descripcion;
                $row[]=$aPedidos[$i] ->total;
                $row[]=$aPedidos[$i] ->sucursal;
                $row[]=$aPedidos[$i] ->cliente;
                $row[]=$aPedidos[$i] ->estado;
                $cont++;
                $data[]=$row; 
      
            };
            $json_data=array(
                "draw"=>intval($request['draw']),
                "recordsTotal"=> count($aPedidos),
                "recordsFiltered"=> count($aPedidos),
                "data"=> $data      
            );
            return json_encode($json_data);
        }

        public function editar($id){
            $titulo="Edicion de Pedidos";
            $entidad= new Pedido();
            $pedido=$entidad->obtenerPorId($id);

         
            $sucursal=new Sucursal();
            $aSucursal=$sucursal->obtenerTodos();

            $cliente=new Cliente();
            $aClientes=$cliente->obtenerTodos();
            

            $estado=new Estado();
            $aEstados=$estado->obtenerTodos();
            return view("sistema.pedido-nuevo", compact('titulo', 'pedido', "aSucursal", "aEstados", "aClientes"));
        }

        public function eliminar(Request $request)
        {
              $id = $request->input('id');
          
              $entidad = new Pedido();
              $entidad->idpedido = $id;
              $entidad->eliminar();
              $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
              $aResultado["mensaje"] = "Eliminado correctamente ";
  
              echo json_encode($aResultado);
  
        }
      
      
        


} 