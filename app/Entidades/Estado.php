<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idestado', 'nombre'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idestado = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->nombre = $request->input('txtNombre');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idestado,
                  nombre
                FROM estados ORDER BY nombre";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idestado)
    {
        $sql = "SELECT
                idestado,
                nombre
                FROM estados WHERE idestado= $idestado";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idestado = $lstRetorno[0]->idestado;
            $this->nombre = $lstRetorno[0]->nombre;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE estados SET
            nombre=?
            WHERE idestado=?";
        $affected = DB::update($sql, [
            $this->idestado,
            $this->nombre
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM estados WHERE
            idestado=?";
        $affected = DB::delete($sql, [$this->idestado]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO estados (
                nombre
            ) VALUES (?);";
        $result = DB::insert($sql, [
            $this->nombre
        ]);
        return $this->idestado = DB::getPdo()->lastInsertId();
    }

}
