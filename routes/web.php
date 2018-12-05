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

Route::resource('/users', 'UserController')->middleware('auth');;
Route::get('/users/destroy/{id}', 'UserController@destroy')->middleware('auth');;


Route::resource('/reservas', 'ReservaController')->middleware('auth');;
Route::get('/reservas/destroy/{id}', 'ReservaController@destroy')->middleware('auth');;

Route::resource('/livros', 'LivroController')->middleware('auth');;
Route::get('/livros/destroy/{id}', 'LivroController@destroy')->middleware('auth');;


Route::resource('/autors', 'AutorController')->middleware('auth');;
Route::get('/autors/destroy/{id}', 'AutorController@destroy')->middleware('auth');;

Route::resource('/categorias', 'CategoriaController')->middleware('auth');;
Route::get('/categorias/destroy/{id}', 'CategoriaController@destroy')->middleware('auth');;

Route::resource('/exemplars', 'ExemplarController')->middleware('auth');;
Route::get('/exemplars/destroy/{id}', 'ExemplarController@destroy')->middleware('auth');;

Route::resource('/emprestimos', 'EmprestimoController')->middleware('auth');;
Route::get('/emprestimos/destroy/{id}', 'EmprestimoController@destroy')->middleware('auth');;



Route::resource('/graficos', 'GraficoController')->middleware('auth');;
Route::get('/graficos/show', 'GraficoController@show')->middleware('auth');;
Route::get('/grafico/graf', 'GraficoController@graf')->middleware('auth');;
Route::get('/grafico/graf1', 'GraficoController@graf1')->middleware('auth');;
Route::get('/grafico/graf2', 'GraficoController@graf2')->middleware('auth');;


Route::get('/relatorios/index', 'PdfController@index')->middleware('auth');;
Route::get('/relatorios/index2', 'PdfController@index2')->middleware('auth');;
Route::get('/relatorios/index3', 'PdfController@index3')->middleware('auth');;
Route::get('/relatorios/index4', 'PdfController@index4')->middleware('auth');;
Route::get('/relatorios/index5', 'PdfController@index5')->middleware('auth');;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;
