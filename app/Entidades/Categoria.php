<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idcategoria', 'nombre'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idcategoria = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->nombre = $request->input('txtNombre');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idcategoria,
                  nombre
                FROM categorias ORDER BY nombre";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idcategoria)
    {
        $sql = "SELECT
                idcategoria,
                nombre
                FROM categorias WHERE idcategoria= $idcategoria";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcategoria = $lstRetorno[0]->idcategoria;
            $this->nombre = $lstRetorno[0]->nombre;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE categorias SET
            nombre=?
            WHERE idcategoria=?";
        $affected = DB::update($sql, [
            $this->idcategoria,
            $this->nombre
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM categorias WHERE
            idcategoria=?";
        $affected = DB::delete($sql, [$this->idcategoria]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO categorias (
                nombre
            ) VALUES (?);";
        $result = DB::insert($sql, [
            $this->nombre
        ]);
        return $this->idcategoria = DB::getPdo()->lastInsertId();
    }

}
