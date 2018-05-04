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
    return view('welcome');
});

/*Route::get('/contato/{id?}', function ($id = NULL){
    return "Contato: ".$id;
});
Route::post('/contato', function (){
    dd($_POST); // var_dump com exit;
    return "Contato POST.";
});
Route::put('/contato', function (){
    var_dump($_POST);
    return "Contato PUT.";
});
*/

Route::get('/contato/{id?}', ['uses'=>'ContatoController@index']);

Route::post('/contato', ['uses'=>'ContatoController@criar']);

Route::put('/contato', ['uses'=>'ContatoController@editar']);

Route::delete('/contato', function (){
    var_dump($_POST);
    return "Contato DEL.";
});