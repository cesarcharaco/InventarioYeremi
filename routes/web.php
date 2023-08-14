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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('solicitantes','SolicitantesController');
Route::post('solicitantes/cambiar_status','SolicitantesController@cambiar_status')->name('solicitantes.cambiar_status');
Route::resource('insumos','InsumosController');
Route::resource('gerencias','GerenciasController');
Route::resource('areas','AreasController');

Route::post('prestamos/cambiar_status','PrestamosController@cambiar_status')->name('prestamos.cambiar_status');
Route::get('/prestamos/historial','PrestamosController@historial')->name('prestamos.historial');
Route::post('prestamos/deshacer','PrestamosController@deshacer_prestamo')->name('prestamos.deshacer');
Route::resource('prestamos','PrestamosController');

Route::get('insumos/{id_gerencia}/buscar','PrestamosController@buscar_insumos');
Route::get('insumos/{id_insumo}/buscar_existencia','PrestamosController@buscar_existencia');

Route::get('/incidencias/historial','IncidenciasController@historial')->name('incidencias.historial');
Route::post('incidencias/deshacer','IncidenciasController@deshacer_incidencia')->name('incidencias.deshacer');
Route::resource('incidencias','IncidenciasController');
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