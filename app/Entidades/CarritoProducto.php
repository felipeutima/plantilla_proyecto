<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    protected $table = 'carrito_productos';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idcarrito_producto', 'fk_idproducto', 'fk_idcarrito', 'cantidad'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idcarrito_producto = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->fk_idproducto = $request->input('txtfk_idproducto');
        $this->fk_idcarrito = $request->input('txtfk_idcarrito');
        $this->cantidad = $request->input('txtcantidad') != "" ? $request->input('txtcantidad') : 0;
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idcarrito_producto,
                  fk_idproducto,
                  fk_idcarrito,
                  cantidad
                FROM carrito_productos ORDER BY fk_idproducto";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idcarrito_producto)
    {
        $sql = "SELECT
                idcarrito_producto,
                fk_idproducto,
                fk_idcarrito,
                cantidad
                FROM carrito_productos WHERE idcarrito_producto = $idcarrito_producto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcarrito_producto = $lstRetorno[0]->idcarrito_producto;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            $this->fk_idcarrito = $lstRetorno[0]->fk_idcarrito;
            $this->cantidad = $lstRetorno[0]->cantidad;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE clientes SET
            fk_idproducto=?,
            fk_idcarrito=?,
            cantidad=?
            WHERE idcarrito_producto=?";
        $affected = DB::update($sql, [
            $this->idcarrito_producto,
            $this->fk_idproducto,
            $this->fk_idcarrito,
            $this->cantidad
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM carrito_productos WHERE
            idcarrito_producto=?";
        $affected = DB::delete($sql, [$this->idcarrito_producto]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO carrito_productos (
                fk_idproducto,
                fk_idcarrito,
                cantidad
            ) VALUES (?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idproducto,
            $this->fk_idcarrito,
            $this->cantidad
        ]);
        return $this->idcliente = DB::getPdo()->lastInsertId();
    }

}
