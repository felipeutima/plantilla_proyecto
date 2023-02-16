<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    protected $table = 'pedidos_productos';
    public $timestamps = false; //indica si toca poner preciounitario de insercion

    protected $fillable = [ //cuales son las columnas 
        'idpedidoproductos', 'preciounitario', 'cantidad', 'total', 'fk_idproducto', 'fk_idpedido'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idpedidoproductos = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->preciounitario = $request->input('txtpreciounitario');
        $this->cantidad = $request->input('txtcantidad');
        $this->fk_idproducto = $request->input('txtSucursal') != "" ? $request->input('txtsucursal') : 0;
        $this->fk_idpedido = $request->input('txtCliente');
        $this->total = $request->input('txtTotal');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idpedidoproductos,
                  preciounitario,
                  cantidad,
                  total,
                  fk_idproducto,
                  fk_idpedido
                FROM pedidos_productos ORDER BY preciounitario";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idpedidoproductos)
    {
        $sql = "SELECT
                idpedidoproductos,
                preciounitario,
                cantidad,
                total,
                fk_idproducto,
                fk_idpedido
                FROM pedidos_productos WHERE idpedidoproductos = $idpedidoproductos";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedidoproductos = $lstRetorno[0]->idpedidoproductos;
            $this->preciounitario = $lstRetorno[0]->preciounitario;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            $this->fk_idpedido = $lstRetorno[0]->fk_idpedido;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE pedidos_productos SET
            preciounitario=?,
            cantidad=?,
            total=?,
            fk_idproducto=?,
            fk_idpedido=?
            WHERE idpedidoproductos=?";
        $affected = DB::update($sql, [
            $this->idpedidoproductos,
            $this->preciounitario,
            $this->cantidad,
            $this->total,
            $this->fk_idproducto,
            $this->fk_idpedido
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos_productos WHERE
            idpedidoproductos=?";
        $affected = DB::delete($sql, [$this->idpedidoproductos]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO pedidos_productos (
                preciounitario,
                cantidad,
                total,
                fk_idproducto,
                fk_idpedido
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->preciounitario,
            $this->cantidad,
            $this->total,
            $this->fk_idproducto,
            $this->fk_idpedido
        ]);
        return $this->idpedidoproductos = DB::getPdo()->lastInsertId();
    }

}
