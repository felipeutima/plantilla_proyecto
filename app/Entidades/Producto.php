<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false; //indica si toca poner fecha de insercion

    protected $fillable = [ //cuales son las columnas 
        'idproducto', 'nombre', 'cantidad', 'precio', 'imagen', 'fk_idcategoria'
    ];

    protected $hidden = [ //si hay columnas que deban ir ocultas

    ];

    public function cargarDesdeRequest($request) {
        $this->idproducto = $request->input('id') != "0" ? $request->input('id') : $this->idmenu;
        $this->nombre = $request->input('txtNombre');
        $this->cantidad = $request->input('txtCantidad');
        $this->precio = $request->input('txtPrecio') != "" ? $request->input('txtPrecio') : 0;
        $this->imagen ="";
        $this->fk_idcategoria = $request->input('lstCategoria');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idproducto,
                  nombre,
                  cantidad,
                  precio,
                  imagen,
                  fk_idcategoria
                FROM productos ORDER BY nombre";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


    public function obtenerPorId($idproducto)
    {
        $sql = "SELECT
                idproducto,
                nombre,
                cantidad,
                precio,
                imagen,
                fk_idcategoria
                FROM productos WHERE idproducto = $idproducto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idproducto = $lstRetorno[0]->idproducto;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->precio = $lstRetorno[0]->precio;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->fk_idcategoria = $lstRetorno[0]->fk_idcategoria;
            return $this;
        }
        return null;
    }

    public function guardar() { //es el actualizar
        $sql = "UPDATE productos SET
            nombre=?,
            cantidad=?,
            precio=?,
            imagen=?,
            fk_idcategoria=?
            WHERE idproducto=?";
        $affected = DB::update($sql, [
            $this->nombre,
            $this->cantidad,
            $this->precio,
            $this->imagen,
            $this->fk_idcategoria,
            $this->idproducto
        ]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM productos WHERE
            idproducto=?";
        $affected = DB::delete($sql, [$this->idproducto]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO productos (
                nombre,
                cantidad,
                precio,
                imagen,
                fk_idcategoria
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->cantidad,
            $this->precio,
            $this->imagen,
            $this->fk_idcategoria
        ]);
        return $this->idcliente = DB::getPdo()->lastInsertId();
    }
    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.nombre',
            1 => 'A.cantidad',
            2 => 'A.precio',
            3 => 'A.imagen',
            4 => 'A.fk_idcategoria'
        );
        $sql = "SELECT DISTINCT
                A.idproducto,
                A.nombre,
                A.cantidad,
                A.precio,
                A.imagen,
                B.nombre AS categoria,
                A.fk_idcategoria
                
                FROM productos A
                INNER JOIN categorias B ON A.fk_idcategoria = B.idcategoria
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.cantidad LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.imagen LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR B.nombre LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorCategoria($idcategoria)
    {
        $sql = "SELECT
                  nombre,
                  cantidad,
                  precio,
                  imagen,
                  fk_idcategoria
                FROM productos WHERE fk_idcategoria= $idcategoria";
        $lstRetorno = DB::select($sql); //devuelve el array
        return $lstRetorno; //retorno el array
    }


}
