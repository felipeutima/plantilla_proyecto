<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idsucursal', 'nombre', 'linkmap'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idsucursal = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->nombre = $request->input('txtNombre');
        $this->linkmap = $request->input('txtMap');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idsucursal,
                  nombre,
                  telefono,
                  linkmap
                FROM sucursales ORDER BY nombre";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idsucursal)
    {
        $sql = "SELECT
                idsucursal,
                nombre,
                linkmap
                FROM sucursales WHERE idsucursal= $idsucursal";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idsucursal = $lstRetorno[0]->idsucursal;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->linkmap = $lstRetorno[0]->linkmap;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE sucursales SET
            nombre=?,
            linkmap=?
            WHERE idsucursal=?";
        $affected = DB::update($sql, [
      
            $this->nombre,
            $this->linkMap,
            $this->idsucursal

        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM sucursales WHERE
            idsucursal=?";
        $affected = DB::delete($sql, [$this->idsucursal]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO sucursales (
                nombre,
                linkmap
            ) VALUES (?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->linkmap,
        ]);
        return $this->idsucursal = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.nombre',
            1 => 'A.linkmap'
        );
        $sql = "SELECT DISTINCT
                A.idsucursal,
                A.nombre,
                A.linkmap
                
                FROM sucursales A
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.linkmap LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }


}
