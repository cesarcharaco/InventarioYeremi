<?php

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

Route::get('/portal_etar/about', 'PortalEtarController@about')->name('nosotros');
Route::get('/portal_etar/home', 'PortalEtarController@home')->name('home_portal');
Route::get('/portal_etar/curso2', 'PortalEtarController@curso2')->name('curso2');
Route::get('/portal_etar/curso3', 'PortalEtarController@curso3')->name('curso3');
Route::get('/portal_etar/curso4', 'PortalEtarController@curso4')->name('curso4');
Route::get('/portal_etar/curso5', 'PortalEtarController@curso5')->name('curso5');
Route::get('/portal_etar/blog', 'PortalEtarController@blog')->name('blog');
Route::get('/portal_etar/blogs', 'PortalEtarController@blogs')->name('blogs');
Route::get('/portal_etar/profesores', 'PortalEtarController@profesores')->name('profesores');
Route::get('/portal_etar/contacto', 'PortalEtarController@contacto')->name('contacto');
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('solicitantes','SolicitantesController');
Route::post('solicitantes/cambiar_status','SolicitantesController@cambiar_status')->name('solicitantes.cambiar_status');
Route::get('insumos/{id_insumo}/{id_local}/editar','InsumosController@edit')->name('insumos.editar');
Route::resource('insumos','InsumosController');
Route::resource('gerencias','GerenciasController');
Route::resource('areas','AreasController');

Route::post('prestamos/cambiar_status','PrestamosController@cambiar_status')->name('prestamos.cambiar_status');
Route::get('/prestamos/historial','PrestamosController@historial')->name('prestamos.historial');
Route::post('prestamos/deshacer','PrestamosController@deshacer_prestamo')->name('prestamos.deshacer');
Route::resource('prestamos','PrestamosController');

Route::get('insumos/{id_gerencia}/buscar','PrestamosController@buscar_insumos');
Route::get('insumos/{id_insumo}/buscar_existencia','PrestamosController@buscar_existencia');
//Route::get('insumos/{id_insumo}/buscar_existencia','IncidenciasController@buscar_existencia');
Route::get('/incidencias/historial','IncidenciasController@historial')->name('incidencias.historial');
Route::get('/incidencias/{id_incidencia}/detalles_historial','IncidenciasController@detalles_historial')->name('incidencias.historial_detalles');

Route::post('incidencias/deshacer','IncidenciasController@deshacer_incidencia')->name('incidencias.deshacer');

Route::resource('incidencias','IncidenciasController');
Route::get('/salidas/{id_local}/listar','SalidaController@index')->name('salidas.listar');
Route::get('/salidas/index2','SalidaController@index2')->name('salidas.index2');
Route::get('/salidas/seleccionar_local','SalidaController@seleccionar_local')->name('seleccionar_local');
Route::post('/salidas/create2','SalidaController@create2')->name('salidas.create2');
Route::get('/salidas/{id_local}/createl','SalidaController@create3')->name('salidas.createl');
Route::resource('salidas','SalidaController');
Route::post('local/cambiar_status','LocalController@cambiar_estado')->name('local.cambiar_estado');
Route::resource('local','LocalController');
/*Route::get('inventario/insumos', function () {
    return view('inventario/insumos/index');
});
Route::get('inventario/insumos/create', function () {
    return view('inventario/insumos/create');
});
*/
/*Route::get('inventario/prestamos', function () {
    return view('inventario/prestamos/index');
});
Route::get('inventario/prestamos/create', function () {
    return view('inventario/prestamos/create');
});
*/

/*Route::get('inventario/incidencias', function () {
    return view('inventario/incidencias/index');
});
Route::get('inventario/incidencias/create', function () {
    return view('inventario/incidencias/create');
});*/

/*Route::get('solicitantes', function () {
    return view('solicitantes/index');
});
Route::get('solicitantes/create', function () {
    return view('solicitantes/create');
});*/

Route::get('generar_reporte', 'ReportesController@store');
Route::get('generar_reporte', 'ReportesController@store')->name('generar_reporte');
Route::resource('reportes','ReportesController');

Route::get('graficas', function () {
    return view('graficas/index');
});