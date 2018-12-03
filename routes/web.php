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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
