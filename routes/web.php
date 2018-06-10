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
Route::get('/admin/REPORTES', 'tareas@REPORTES');

Route::get('/admin/PGR1_R2_FILTRO', 'tareas@PGR1_R2_FILTRO');
Route::post('/admin/PGR1_R2_REPORTE', 'tareas@PGR1_R2_REPORTE');
Route::get('/admin/PGR1_R2_REPORTE_DESCARGAR', 'tareas@PGR1_R2_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R4_5_FILTRO', 'tareas@PGP2_R4_5_FILTRO');
Route::post('/admin/PGP2_R4_5_REPORTE', 'tareas@PGP2_R4_5_REPORTE');
Route::get('/admin/PGP2_R4_5_REPORTE_DESCARGAR', 'tareas@PGP2_R4_5_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R4_4_FILTRO', 'tareas@PGP2_R4_4_FILTRO');
Route::post('/admin/PGP2_R4_4_REPORTE', 'tareas@PGP2_R4_4_REPORTE');
Route::get('/admin/PGP2_R4_4_REPORTE_DESCARGAR', 'tareas@PGP2_R4_4_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R4_3_FILTRO', 'tareas@PGP2_R4_3_FILTRO');
Route::post('/admin/PGP2_R4_3_REPORTE', 'tareas@PGP2_R4_3_REPORTE');
Route::get('/admin/PGP2_R4_3_REPORTE_DESCARGAR', 'tareas@PGP2_R4_3_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R4_2_FILTRO', 'tareas@PGP2_R4_2_FILTRO');
Route::post('/admin/PGP2_R4_2_REPORTE', 'tareas@PGP2_R4_2_REPORTE');
Route::get('/admin/PGP2_R4_2_REPORTE_DESCARGAR', 'tareas@PGP2_R4_2_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R4_1_FILTRO', 'tareas@PGP2_R4_1_FILTRO');
Route::post('/admin/PGP2_R4_1_REPORTE', 'tareas@PGP2_R4_1_REPORTE');
Route::get('/admin/PGP2_R4_1_REPORTE_DESCARGAR', 'tareas@PGP2_R4_1_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R6_FILTRO', 'tareas@PGP2_R6_FILTRO');
Route::post('/admin/PGP2_R6_REPORTE', 'tareas@PGP2_R6_REPORTE');
Route::get('/admin/PGP2_R6_REPORTE_DESCARGAR', 'tareas@PGP2_R6_REPORTE_DESCARGAR');

Route::get('/admin/PGP3_R3_FILTRO', 'tareas@PGP3_R3_FILTRO');
Route::get('/admin/PGP3_R3_QUERY/{orden_servicio}/{tipo}', 'tareas@PGP3_R3_QUERY');
Route::post('/admin/PGP3_R3_REPORTE', 'tareas@PGP3_R3_REPORTE');
Route::get('/admin/PGP3_R3_REPORTE_DESCARGAR', 'tareas@PGP3_R3_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R5_FILTRO', 'tareas@PGP2_R5_FILTRO');
Route::post('/admin/PGP2_R5_REPORTE', 'tareas@PGP2_R5_REPORTE');
Route::get('/admin/PGP2_R5_REPORTE_DESCARGAR', 'tareas@PGP2_R5_REPORTE_DESCARGAR');

Route::get('/admin/PGR2_R1_FILTRO', 'tareas@PGR2_R1_FILTRO');
Route::post('/admin/PGR2_R1_REPORTE', 'tareas@PGR2_R1_REPORTE');
Route::get('/admin/PGR2_R1_REPORTE_DESCARGAR', 'tareas@PGR2_R1_REPORTE_DESCARGAR');

Route::get('/admin/PGR1_R6_FILTRO', 'tareas@PGR1_R6_FILTRO');
Route::post('/admin/PGR1_R6_REPORTE', 'tareas@PGR1_R6_REPORTE');
Route::get('/admin/PGR1_R6_REPORTE_DESCARGAR', 'tareas@PGR1_R6_REPORTE_DESCARGAR');

Route::get('/admin/PGR2_R3_FILTRO', 'tareas@PGR2_R3_FILTRO');
Route::post('/admin/PGR2_R3_REPORTE', 'tareas@PGR2_R3_REPORTE');
Route::get('/admin/PGR2_R3_REPORTE_DESCARGAR', 'tareas@PGR2_R3_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R3_FILTRO', 'tareas@PGP2_R3_FILTRO');
Route::post('/admin/PGP2_R3_REPORTE', 'tareas@PGP2_R3_REPORTE');
Route::get('/admin/PGP2_R3_REPORTE_DESCARGAR', 'tareas@PGP2_R3_REPORTE_DESCARGAR');

Route::get('/admin/PGP3_R5_FILTRO', 'tareas@PGP3_R5_FILTRO');
Route::post('/admin/PGP3_R5_REPORTE', 'tareas@PGP3_R5_REPORTE');
Route::get('/admin/PGP3_R5_REPORTE_DESCARGAR', 'tareas@PGP3_R5_REPORTE_DESCARGAR');

Route::get('/admin/PGP3_R4_FILTRO', 'tareas@PGP3_R4_FILTRO');
Route::post('/admin/PGP3_R4_REPORTE', 'tareas@PGP3_R4_REPORTE');
Route::get('/admin/PGP3_R4_REPORTE_DESCARGAR', 'tareas@PGP3_R4_REPORTE_DESCARGAR');

Route::get('/admin/PGP2_R7_FILTRO', 'tareas@PGP2_R7_FILTRO');
Route::post('/admin/PGP2_R7_REPORTE', 'tareas@PGP2_R7_REPORTE');
Route::get('/admin/PGP2_R7_REPORTE_DESCARGAR', 'tareas@PGP2_R7_REPORTE_DESCARGAR');

Route::get('/admin/PGR1_R4_FILTRO', 'tareas@PGR1_R4_FILTRO');
Route::post('/admin/PGR1_R4_REPORTE', 'tareas@PGR1_R4_REPORTE');
Route::get('/admin/PGR1_R4_REPORTE_DESCARGAR', 'tareas@PGR1_R4_REPORTE_DESCARGAR');

Route::get('/admin/PGR1_R3_FILTRO', 'tareas@PGR1_R3_FILTRO');
Route::post('/admin/PGR1_R3_REPORTE', 'tareas@PGR1_R3_REPORTE');
Route::get('/admin/PGR1_R3_REPORTE_DESCARGAR', 'tareas@PGR1_R3_REPORTE_DESCARGAR');

Route::get('/admin/PGR2_R2_FILTRO', 'tareas@PGR2_R2_FILTRO');
Route::post('/admin/PGR2_R2_REPORTE', 'tareas@PGR2_R2_REPORTE');
Route::get('/admin/PGR2_R2_REPORTE_DESCARGAR', 'tareas@PGR2_R2_REPORTE_DESCARGAR');

Route::get('/admin/PGR1_R1_FILTRO', 'tareas@PGR1_R1_FILTRO');
Route::post('/admin/PGR1_R1_REPORTE', 'tareas@PGR1_R1_REPORTE');
Route::get('/admin/PGR1_R1_REPORTE_DESCARGAR', 'tareas@PGR1_R1_REPORTE_DESCARGAR');

Route::post('/tareas', 'tareas@modificarDetalleInpeccion');
Route::post('/agregarLote', 'tareas@agregarLote');
Route::post('/eliminarLote', 'tareas@eliminarLote');
Route::post('/traerBotones', 'tareas@traerBotonesLote2');
Route::post('/traerDetallesSalidaMaterialTrazabilidad', 'tareas@mostrarMaterialesSalidaTrazabilidad');
Route::post('/traerDetallesSalidaMaterial', 'tareas@mostrarMaterialesSalida');
Route::post('/traerFormularioSacarMaterial', 'tareas@sacarMaterial');
Route::post('/taerCantDisponibleLoteEntrada', 'tareas@traerDisponibleLoteEntrada');
Route::post('/darSalidaMaterial', 'tareas@darSalidaMaterial');
Route::post('/devolverMatSacado', 'tareas@devolverMatSacado');

Route::get('/', function () {
    //return view('welcome');
    return redirect('/admin');
});

Route::get('/admin/detalle_salida_mat/disponibilidad/{id}', 'AdminDetalleSalidaMatController@disponibilidad');

Route::get('/admin/detalle_materiales_orden/disponibilidad/{id}', 'AdminDetalleMaterialesOrdenController@disponibilidad');

Route::get('/admin/tareas/listado_materiales/{id}', 'tareas@listado_materiales');
Route::get('/admin/tareas/listado_vin/{id}', 'tareas@listado_vin');
Route::get('/admin/tareas/listado_modelo/{id}', 'tareas@listado_modelo');
Route::get('/admin/tareas/talla/{id}', 'tareas@talla');
Route::get('/admin/tareas/descripcion/{id}', 'tareas@descripcion');
