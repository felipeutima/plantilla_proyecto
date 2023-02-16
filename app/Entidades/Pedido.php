<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idpedido', 'fecha', 'descripcion', 'total', 'fk_idsucursal', 'fk_idcliente', 'fk_idestado',
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idpedido = $request->input('id') != "0" ? $request->input('id') : $this->idpedido;
        $this->fecha = $request->input('txtFecha');
        $this->descripcion = $request->input('txtDescripcion');
        $this->fk_idsucursal = $request->input('lstSucursal') ;
        $this->fk_idcliente = $request->input('lstCliente');
        $this->fk_idestado = $request->input('lstEstado');
        $this->total = $request->input('txtTotal');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idpedido,
                  fecha,
                  descripcion,
                  total,
                  fk_idsucursal,
                  fk_idcliente,
                  fk_idestado
                FROM pedidos ORDER BY fecha";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }

    public function obtenerPorCliente($idcliente)
    {
        $sql = "SELECT
                A.idpedido,
                A.fecha,    
                A.descripcion,
                A.total,
                A.fk_idsucursal,
                A.fk_idcliente,
                A.fk_idestado,
                B.nombre AS sucursal,
                C.nombre AS estado
            FROM pedidos A 
            INNER JOIN sucursales B ON A.fk_idsucursal= B.idsucursal
            INNER JOIN estados C ON A.fk_idestado= C.id_estado
            WHERE fk_idcliente= $idcliente";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }

    public function obtenerPorSucursal($idsucursal)
    {
        $sql = "SELECT
                  idpedido,
                  fecha,    
                  descripcion,
                  total,
                  fk_idsucursal,
                  fk_idcliente,
                  fk_idestado
                FROM pedidos WHERE fk_idsucursal= $idsucursal";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idpedido)
    {
        $sql = "SELECT
                idpedido,
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_idestado
                FROM pedidos WHERE idpedido = $idpedido";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedido = $lstRetorno[0]->idpedido;
            $this->fecha = $lstRetorno[0]->fecha;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idsucursal = $lstRetorno[0]->fk_idsucursal;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            $this->fk_idestado = $lstRetorno[0]->fk_idestado;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE pedidos SET
            fecha=?,
            descripcion=?,
            total=?,
            fk_idsucursal=?,
            fk_idcliente=?,
            fk_idestado=?
            WHERE idpedido=?";
        $affected = DB::update($sql, [
            $this->fecha,
            $this->descripcion,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_idestado,
            $this->idpedido
        ]);
    }
    public function aprobado($idpedido) { //es el actualizar
        $sql = "UPDATE pedidos SET
            fk_idestado=?
            WHERE idpedido=?";
        $affected = DB::update($sql, [
            5,
            $idpedido
          ]);
    }
    public function error($idpedido) { //es el actualizar
        $sql = "UPDATE pedidos SET
            fk_idestado=?
            WHERE idpedido=?";
        $affected = DB::update($sql, [
            1,
            $idpedido
          ]);
    }
    public function pendiente($idpedido) { //es el actualizar
        $sql = "UPDATE pedidos SET
            fk_idestado=?
            WHERE idpedido=?";
        $affected = DB::update($sql, [
            1,
            $idpedido
          ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos WHERE
            idpedido=?";
        $affected = DB::delete($sql, [$this->idpedido]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO pedidos (
                fecha,
                descripcion,
                total,
                fk_idsucursal,
                fk_idcliente,
                fk_idestado
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fecha,
            $this->descripcion,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_idestado
        ]);
        return $this->idpedido = DB::getPdo()->lastInsertId();
    }

    
    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.fecha',
            1 => 'A.descripcion',
            2 => 'A.total',
            3 => 'A.fk_idsucursal',
            4 => 'A.fk_idcliente',
            5 => 'A.fk_idestado'
        );
        $sql = "SELECT DISTINCT
                A.idpedido,
                A.fecha,
                A.descripcion,
                A.total,
                A.fk_idsucursal,
                A.fk_idcliente,
                A.fk_idestado,
                B.nombre AS sucursal, 
                C.nombre AS cliente,
                D.nombre AS estado
                FROM pedidos A
                INNER JOIN sucursales B ON A.fk_idsucursal = B.idsucursal
                INNER JOIN clientes C ON A.fk_idcliente = C.idcliente
                INNER JOIN estados D ON A.fk_idestado = D.id_estado
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.fecha LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.total LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR B.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR D.nombre LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

}
