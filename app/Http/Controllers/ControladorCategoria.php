<?php

namespace App\Http\Controllers;

use App\Entidades\Categoria;
use App\Entidades\Producto;
use Illuminate\Http\Request;

use App\Http\Controllers\Exception;

include_once app_path() . '/start/constants.php'; //para incluir las constantes 

class ControladorCategoria extends Controller{//para identificar como controlador

      public function nuevo(){
            $titulo="Nueva Categoria";
            $categoria=new Categoria();
            return view("sistema.categoria-nuevo", compact("titulo","categoria"));//indico la vista y compact lleva la variable
      }
      public function index(){
            return view("sistema.categoria-listar");
      }

      public function cargarGrilla(){
   
            $request=$_REQUEST;
      
            $entidad=new Categoria();
            $aCategoria=$entidad->obtenerFiltrado();
       
      
            $data=array();
            $cont=0;
      
            $inicio=$request['start'];
            $registros_por_pagina= $request['length'];
      
            for ($i = $inicio; $i < count($aCategoria) && $cont < $registros_por_pagina; $i++){
                  
      
                $row=array();
                $row[]='<a href="/admin/categoria/'. $aCategoria[$i]->idcategoria . '">EDITAR</a>';
                $row[]=$aCategoria[$i] ->nombre;
                $cont++;
                $data[]=$row; 
      
            };
            $json_data=array(
                "draw"=>intval($request['draw']),
                "recordsTotal"=> count($aCategoria),
                "recordsFiltered"=> count($aCategoria),
                "data"=> $data      
            );
            return json_encode($json_data);
        }

        public function guardar(Request $request)
        {
              try {
                    //define la entidad servicio
  
                    $titulo = "Modificar Categoria";
                    $entidad = new Categoria();
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
                          $_POST["id"] = $entidad->idcategoria;
                          return view("sistema.categoria-listar", compact('titulo', 'msg'));
                    }
              } catch (Exception $e) {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = ERRORINSERT;
              }
  
              $id= $entidad->idcategoria;
              $categoria=new Categoria();
              //para obtener los datos del sucursal dentro del formulario
              if($id>0){
                    $categoria->obtenerPorId($id);
              }
              return view("sistema.categoria-listar", compact('titulo', 'msg', 'categoria')). '?id='.$categoria->idcategoria;
        }

        public function editar($id)
        {
              $titulo = "Edicion de Categoria";
              $entidad = new Categoria();
              $categoria = $entidad->obtenerPorId($id);
              return view("sistema.categoria-nuevo", compact('titulo', 'categoria'));
        }
      

        
        public function eliminar(Request $request)
        {
              $id = $request->input('id');
          
  
              $producto=new Producto();
              $aProducto=$producto->obtenerPorCategoria($id);
  
              if(count($aProducto)==0){
                    $entidad = new Categoria();
                    $entidad->idcategoria = $id;
                    $entidad->eliminar();
                    $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente 
                    $aResultado["mensaje"] = "Eliminado correctamente ";
              } else{
                    $aResultado["err"] = EXIT_FAILURE;
                    $aResultado["mensaje"] = "No se puede eliminar categoria con pedidos asociados";
              }
  
              echo json_encode($aResultado);
  
        }



} 