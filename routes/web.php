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
    return redirect('/login');
});

Route::resource('/users', 'UserController');
Route::get('/users/destroy/{id}', 'UserController@destroy');


Route::resource('/reservas', 'ReservaController');
Route::get('/reservas/destroy/{id}', 'ReservaController@destroy');

Route::resource('/livros', 'LivroController');
Route::get('/livros/destroy/{id}', 'LivroController@destroy');


Route::resource('/autors', 'AutorController');
Route::get('/autors/destroy/{id}', 'AutorController@destroy');

Route::resource('/categorias', 'CategoriaController');
Route::get('/categorias/destroy/{id}', 'CategoriaController@destroy');

Route::resource('/exemplars', 'ExemplarController');
Route::get('/exemplars/destroy/{id}', 'ExemplarController@destroy');

Route::resource('/emprestimos', 'EmprestimoController');
Route::get('/emprestimos/destroy/{id}', 'EmprestimoController@destroy');



Route::resource('/graficos', 'GraficoController');
Route::get('/graficos/show', 'GraficoController@show');
Route::get('/grafico/graf', 'GraficoController@graf');
Route::get('/grafico/graf1', 'GraficoController@graf1');
Route::get('/grafico/graf2', 'GraficoController@graf2');


Route::get('/relatorios/index', 'PdfController@index');
Route::get('/relatorios/index2', 'PdfController@index2');
Route::get('/relatorios/index3', 'PdfController@index3');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
