<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idcarrito', 'fk_idcliente'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idcarrito = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->fk_idcliente = $request->input('txtfk_idcliente');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idcarrito,
                  fk_idcliente
                FROM carritos ORDER BY fk_idcliente";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idcarrito)
    {
        $sql = "SELECT
                idcarrito,
                fk_idcliente
                FROM carritos WHERE idcarrito= $idcarrito";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcarrito = $lstRetorno[0]->idcarrito;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            return $this;
        }
        return null;
    }


    public function obtenerPorCliente($idcliente)
    {
        $sql = "SELECT
                idcarrito,
                fk_idcliente
                FROM carritos WHERE fk_idcliente= $idcliente";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcarrito = $lstRetorno[0]->idcarrito;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE carritos SET
            fk_idcliente=?
            WHERE idcarrito=?";
        $affected = DB::update($sql, [
            $this->idcarrito,
            $this->fk_idcliente
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM carritos WHERE
            idcarrito=?";
        $affected = DB::delete($sql, [$this->idcarrito]);
    }
    public function eliminarPorCliente($idCliente)
    {
        $sql = "DELETE FROM carritos WHERE
            fk_idcliente=?";
        $affected = DB::delete($sql, [$idCliente]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO carritos (
                fk_idcliente
            ) VALUES (?);";
        $result = DB::insert($sql, [
            $this->fk_idcliente
        ]);
        return $this->idcarrito = DB::getPdo()->lastInsertId();
    }

}
