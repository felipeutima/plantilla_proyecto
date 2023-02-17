<?php

namespace App\Http\Controllers;

use App\Entidades\Pedido;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorSucursal extends Controller{//para identificar como controlador

      public function nuevo(){
            $titulo="Nueva Sucursal";
            $sucursal=new Sucursal();
            return view("sistema.sucursal-nuevo", compact("titulo","sucursal"));//indico la vista y compact lleva la variable
      }
      public function index(){
            return view("sistema.sucursal-listar");
      }

      public function cargarGrilla(){
   
            $request=$_REQUEST;
      
            $entidad=new Sucursal();
            $aSucursal=$entidad->obtenerFiltrado();
       
      
            $data=array();
            $cont=0;
      
            $inicio=$request['start'];
            $registros_por_pagina= $request['length'];
      
            for ($i = $inicio; $i < count($aSucursal) && $cont < $registros_por_pagina; $i++){
                  
      
                $row=array();
                $row[]='<a href="/admin/sucursal/'. $aSucursal[$i]->idsucursal . '">EDITAR</a>';
                $row[]=$aSucursal[$i] ->nombre;
                $row[]=$aSucursal[$i] ->linkmap;
                $cont++;
                $data[]=$row; 
      
            };
            $json_data=array(
                "draw"=>intval($request['draw']),
                "recordsTotal"=> count($aSucursal),
                "recordsFiltered"=> count($aSucursal),
                "data"=> $data      
            );
            return json_encode($json_data);
        }

        public function editar($id){
            $titulo="Edicion de Sucursal";
            $entidad= new Sucursal();
            $sucursal=$entidad->obtenerPorId($id);
            return view("sistema.sucursal-nuevo", compact('titulo', 'sucursal'));
        }

        public function guardar(Request $request)
        {
              try {
                    //define la entidad servicio
  
                    $titulo = "Modificar Sucursal";
                    $entidad = new Sucursal();
                    $entidad->cargarDesdeRequest($request);
               
  
                    //validaciones del formulario
                    if ($entidad->nombre == "" ) {
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
                          $_POST["id"] = $entidad->idsucursal;
                          return view("sistema.sucursal-listar", compact('titulo', 'msg'));
                    }
              } catch (Exception $e) {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = ERRORINSERT;
              }
  
              $id= $entidad->idsucursal;
              $sucursal=new Sucursal;
              //para obtener los datos del sucursal dentro del formulario
              if($id>0){
                    $sucursal->obtenerPorId($id);
              }
              return view("sistema.sucursal-listar", compact('titulo', 'msg', 'sucursal')). '?id='.$sucursal->idsucursal;
        }

        public function eliminar(Request $request)
        {
              $id = $request->input('id');
          
  
              $pedido=new Pedido();
              $aPedidos=$pedido->obtenerPorSucursal($id);
  
              if(count($aPedidos)==0){
                    $entidad = new Sucursal();
                    $entidad->idsucursal = $id;
                    $entidad->eliminar();
                    $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
                    $aResultado["mensaje"] = "Eliminado correctamente ";
              } else{
                    $aResultado["err"] = EXIT_FAILURE;
                    $aResultado["mensaje"] = "No se puede eliminar sucursal con pedidos asociados";
              }
  
              echo json_encode($aResultado);
  
        }

        
        
      


} 