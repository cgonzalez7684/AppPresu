<?php

use Illuminate\Support\Facades\Route;

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
    return view('base.masterPage');
});

Route::get('/carlos','UsuarioController@mostrar');

Route::get('/getUsuarios','UsuarioController@getUsuarios');

Route::post('/registerUsuario','UsuarioController@registerUsuario');

Route::post('/updateUsuario','UsuarioController@updateUsuario');

Route::post('/deleteUsuario','UsuarioController@deleteUsuario');



Route::post('/mostrar','UsuarioController@mostrar');


Route::get('/blanco', function () {
    return view('general.blank');
});

Route::get('/liga',function(){
    return json_encode("Hola mundosss");
});

Route::get('/graficos', function () {
    return view('general.graficos');
});


Route::get('/botones', function () {
    return view('general.botones');
});

Route::get('/tarjetas', function () {
    return view('general.tarjetas');
});

Route::get('/bodegas', function () {
    return view('general.bodega');
});

Route::get('/usuarios', function () {
    return view('administracion.usuarios');
});


Route::match(['get','post'],'/futbols/Juan',function(){
    $datos = ['Nombre'=>'Carlos','Genero'=>'M','Pais'=>50];
    return view('saludoss',['QuePaso'=>$datos]);
});

Route::get('/Paso1/Paso2',function(){
    return "Hola mundo2";
});


Route::get('foo', function () {
    return 'Hello World';
});