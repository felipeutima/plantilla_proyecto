<?php
//use Carbon\Carbon; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Route::get('/time' , function(){$date =new Carbon;echo $date ; } );*/


Route::group(array('domain' => '127.0.0.1'), function () {

    Route::get('/', 'ControladorWebHome@index');
    Route::get('/takeaway', 'ControladorWebTakeaway@index');
    Route::post('/takeaway', 'ControladorWebTakeaway@agregar');
    Route::get('/nosotros', 'ControladorWebNosotros@index');
    Route::post('/nosotros', 'ControladorWebNosotros@guardar');
    Route::get('/contacto', 'ControladorWebContacto@index');
    Route::post('/contacto', 'ControladorWebContacto@enviarContacto');
    Route::get('/mi-cuenta', 'ControladorWebMicuenta@index');
    Route::post('/mi-cuenta', 'ControladorWebMicuenta@actualizar');
    Route::get('/iniciar-sesion', 'ControladorWebIniciarSesion@index');
    Route::post('/iniciar-sesion', 'ControladorWebIniciarSesion@ingresar');
    Route::get('/cerrar-sesion', 'ControladorWebIniciarSesion@cerrarSesion');
    Route::get('/registrarse', 'ControladorWebRegistrarse@index');
    Route::post('/registrarse', 'ControladorWebRegistrarse@guardar');
    Route::get('/recuperar-clave', 'ControladorWebRecuperarClave@index');
    Route::post('/recuperar-clave', 'ControladorWebRecuperarClave@recuperarClave');
    Route::get('/carrito', 'ControladorWebCarrito@index');
    Route::post('/carrito', 'ControladorWebCarrito@confirmarCompra');
    Route::get('/confirmar-compra', 'ControladorWebConfirmarCompra@index');
    Route::get('/mercado-pago/aprobado', 'ControladorWebMercadoPago@aprobado');
    Route::get('/mercado-pago/pendiente', 'ControladorWebMercadoPago@pendiente');
    Route::get('/mercado-pago/error', 'ControladorWebMercadoPago@error');
    Route::get('/admin', 'ControladorHome@index');
    Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR LOGIN                           */
    /* --------------------------------------------- */
    Route::get('/admin/login', 'ControladorLogin@index');
    Route::get('/admin/logout', 'ControladorLogin@logout');
    Route::post('/admin/logout', 'ControladorLogin@entrar');
    Route::post('/admin/login', 'ControladorLogin@entrar');

    /* --------------------------------------------- */
    /* CONTROLADOR RECUPERO CLAVE                    */
    /* --------------------------------------------- */
    Route::get('/admin/recupero-clave', 'ControladorRecuperoClave@index');
    Route::post('/admin/recupero-clave', 'ControladorRecuperoClave@recuperar');

    /* --------------------------------------------- */
    /* CONTROLADOR PERMISO                           */
    /* --------------------------------------------- */
    Route::get('/admin/usuarios/cargarGrillaFamiliaDisponibles', 'ControladorPermiso@cargarGrillaFamiliaDisponibles')->name('usuarios.cargarGrillaFamiliaDisponibles');
    Route::get('/admin/usuarios/cargarGrillaFamiliasDelUsuario', 'ControladorPermiso@cargarGrillaFamiliasDelUsuario')->name('usuarios.cargarGrillaFamiliasDelUsuario');
    Route::get('/admin/permisos', 'ControladorPermiso@index');
    Route::get('/admin/permisos/cargarGrilla', 'ControladorPermiso@cargarGrilla')->name('permiso.cargarGrilla');
    Route::get('/admin/permiso/nuevo', 'ControladorPermiso@nuevo');
    Route::get('/admin/permiso/cargarGrillaPatentesPorFamilia', 'ControladorPermiso@cargarGrillaPatentesPorFamilia')->name('permiso.cargarGrillaPatentesPorFamilia');
    Route::get('/admin/permiso/cargarGrillaPatentesDisponibles', 'ControladorPermiso@cargarGrillaPatentesDisponibles')->name('permiso.cargarGrillaPatentesDisponibles');
    Route::get('/admin/permiso/{idpermiso}', 'ControladorPermiso@editar');
    Route::post('/admin/permiso/{idpermiso}', 'ControladorPermiso@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR GRUPO                             */
    /* --------------------------------------------- */
    Route::get('/admin/grupos', 'ControladorGrupo@index');
    Route::get('/admin/usuarios/cargarGrillaGruposDelUsuario', 'ControladorGrupo@cargarGrillaGruposDelUsuario')->name('usuarios.cargarGrillaGruposDelUsuario'); //otra cosa
    Route::get('/admin/usuarios/cargarGrillaGruposDisponibles', 'ControladorGrupo@cargarGrillaGruposDisponibles')->name('usuarios.cargarGrillaGruposDisponibles'); //otra cosa
    Route::get('/admin/grupos/cargarGrilla', 'ControladorGrupo@cargarGrilla')->name('grupo.cargarGrilla');
    Route::get('/admin/grupo/nuevo', 'ControladorGrupo@nuevo');
    Route::get('/admin/grupo/setearGrupo', 'ControladorGrupo@setearGrupo');
    Route::post('/admin/grupo/nuevo', 'ControladorGrupo@guardar');
    Route::get('/admin/grupo/{idgrupo}', 'ControladorGrupo@editar');
    Route::post('/admin/grupo/{idgrupo}', 'ControladorGrupo@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR USUARIO                           */
    /* --------------------------------------------- */
    Route::get('/admin/usuarios', 'ControladorUsuario@index');
    Route::get('/admin/usuarios/nuevo', 'ControladorUsuario@nuevo');
    Route::post('/admin/usuarios/nuevo', 'ControladorUsuario@guardar');
    Route::post('/admin/usuarios/{usuario}', 'ControladorUsuario@guardar');
    Route::get('/admin/usuarios/cargarGrilla', 'ControladorUsuario@cargarGrilla')->name('usuarios.cargarGrilla');
    Route::get('/admin/usuarios/buscarUsuario', 'ControladorUsuario@buscarUsuario');
    Route::get('/admin/usuarios/{usuario}', 'ControladorUsuario@editar');

    /* --------------------------------------------- */
    /* CONTROLADOR MENU                             */
    /* --------------------------------------------- */
    Route::get('/admin/sistema/menu', 'ControladorMenu@index');
    Route::get('/admin/sistema/menu/nuevo', 'ControladorMenu@nuevo');
    Route::post('/admin/sistema/menu/nuevo', 'ControladorMenu@guardar');
    Route::get('/admin/sistema/menu/cargarGrilla', 'ControladorMenu@cargarGrilla')->name('menu.cargarGrilla');
    Route::get('/admin/sistema/menu/eliminar', 'ControladorMenu@eliminar');
    Route::get('/admin/sistema/menu/{id}', 'ControladorMenu@editar');
    Route::post('/admin/sistema/menu/{id}', 'ControladorMenu@guardar');


    /* --------------------------------------------- */
    /* CONTROLADOR PATENTES                          */
    /* --------------------------------------------- */
    Route::get('/admin/patentes', 'ControladorPatente@index');
    Route::get('/admin/patente/nuevo', 'ControladorPatente@nuevo');
    Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');
    Route::get('/admin/patente/cargarGrilla', 'ControladorPatente@cargarGrilla')->name('patente.cargarGrilla');
    Route::get('/admin/patente/eliminar', 'ControladorPatente@eliminar');
    Route::get('/admin/patente/nuevo/{id}', 'ControladorPatente@editar');
    Route::post('/admin/patente/nuevo/{id}', 'ControladorPatente@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR CLIENTES                         */
    /* --------------------------------------------- */

    Route::get('/admin/clientes', 'ControladorCliente@index');
    Route::get('/admin/cliente/nuevo', 'ControladorCliente@nuevo');
    Route::post('/admin/cliente/nuevo', 'ControladorCliente@guardar');
    Route::get('/admin/cliente/eliminar', 'ControladorCliente@eliminar');
    Route::get('/admin/cliente/cargarGrilla', 'ControladorCliente@cargarGrilla')->name('cliente.cargarGrilla');
    Route::get('/admin/cliente/{id}', 'ControladorCliente@editar');
    Route::post('/admin/cliente/{id}', 'ControladorCliente@guardar');


    /* --------------------------------------------- */
    /* CONTROLADOR PRODUCTOS                     */
    /* --------------------------------------------- */

    Route::get('/admin/producto/nuevo', 'ControladorProducto@nuevo');
    Route::post('/admin/producto/nuevo', 'ControladorProducto@guardar');
    Route::get('/admin/producto/eliminar', 'ControladorProducto@eliminar');
    Route::get('/admin/productos', 'ControladorProducto@index');
    Route::get('/admin/producto/cargarGrilla', 'ControladorProducto@cargarGrilla')->name('producto.cargarGrilla');
    Route::get('/admin/producto/{id}', 'ControladorProducto@editar');
    Route::post('/admin/producto/{id}', 'ControladorProducto@guardar');


    /* --------------------------------------------- */
    /* CONTROLADOR PEDIDOS                    */
    /* --------------------------------------------- */
    /*Route::get('/admin/pedidos/nuevo', 'ControladorProducto@nuevo'); */
    Route::get('/admin/pedido/nuevo', 'ControladorPedidos@nuevo');
    Route::post('/admin/pedido/nuevo', 'ControladorPedidos@guardar');
    Route::get('/admin/pedido/eliminar', 'ControladorPedidos@eliminar');
    Route::get('/admin/pedidos', 'ControladorPedidos@index');
    Route::get('/admin/pedido/cargarGrilla', 'ControladorPedidos@cargarGrilla')->name('pedido.cargarGrilla');
    Route::get('/admin/pedido/{id}', 'ControladorPedidos@editar');
    Route::post('/admin/pedido/{id}', 'ControladorPedidos@guardar');


    /* --------------------------------------------- */
    /* CONTROLADOR POSTULACION                */
    /* --------------------------------------------- */
    Route::get('/admin/postulacion/nuevo', 'ControladorPostulacion@nuevo');
    Route::get('/admin/postulaciones', 'ControladorPostulacion@index');
    Route::post('/admin/postulacion/nuevo', 'ControladorPostulacion@guardar');
    Route::get('/admin/postulacion/eliminar', 'ControladorPostulacion@eliminar');
    Route::get('/admin/postulaciones/cargarGrilla', 'ControladorPostulacion@cargarGrilla')->name('postulaciones.cargarGrilla');
    Route::get('/admin/postulacion/{id}', 'ControladorPostulacion@editar');
    Route::post('/admin/postulacion/{id}', 'ControladorPostulacion@guardar');


    /* --------------------------------------------- */
    /* CONTROLADOR SUCURSAL               */
    /* --------------------------------------------- */
    Route::get('/admin/sucursal/nuevo', 'ControladorSucursal@nuevo');
    Route::get('/admin/sucursales', 'ControladorSucursal@index');
    Route::post('/admin/sucursal/nuevo', 'ControladorSucursal@guardar');
    Route::get('/admin/sucursal/eliminar', 'ControladorSucursal@eliminar');
    Route::get('/admin/sucursales/cargarGrilla', 'ControladorSucursal@cargarGrilla')->name('sucursales.cargarGrilla');
    Route::get('/admin/sucursal/{id}', 'ControladorSucursal@editar');
    Route::post('/admin/sucursal/{id}', 'ControladorSucursal@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR CATEGORIA            */
    /* --------------------------------------------- */
    Route::get('/admin/categoria/nuevo', 'ControladorCategoria@nuevo');
    Route::get('/admin/categorias', 'ControladorCategoria@index');
    Route::get('/admin/categoria/eliminar', 'ControladorCategoria@eliminar');
    Route::get('/admin/categorias/cargarGrilla', 'ControladorCategoria@cargarGrilla')->name('categorias.cargarGrilla');
    Route::post('/admin/categoria/nuevo', 'ControladorCategoria@guardar');
    Route::get('/admin/categoria/{id}', 'ControladorCategoria@editar');
    Route::post('/admin/categoria/{id}', 'ControladorCategoria@guardar');

});

