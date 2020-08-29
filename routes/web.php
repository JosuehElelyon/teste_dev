<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', 'LoginController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Aluno
Route::get('/aluno',  'CadastroAuloController@list')->name('listar_aluno'); // Pegar os dados 
Route::get('/aluno/criar',  'CadastroAuloController@create')->name('cadastro_aluno'); // Pegar os dados 
Route::post('/aluno/nova', 'CadastroAuloController@store')->name('salvar_aluno'); // O post é usado para salvar
Route::get('/aluno/ver/{id}', 'CadastroAuloController@show'); //Aqui eu to colocando pra puxar do banco
Route::get('/aluno/editar/{id}', 'CadastroAuloController@edit')->name('editar_aluno');
Route::get('/aluno/delete/{id}', 'CadastroAuloController@delete')->name('excluir_aluno');
Route::get('/aluno/procurar', 'CadastroAuloController@search')->name('procurar_aluno');

//Curso
Route::get('/curso', 'CursoController@list')->name('listar_curso');
Route::get('/curso/criar', 'CursoController@create')->name('cadastro_curso');
Route::post('/curso/nova', 'CursoController@store')->name('salvar_curso');
Route::get('/curso/ver/{id}', 'CursoController@show');
Route::get('/curso/editar/{id}', 'CursoController@edit')->name('editar_curso');
Route::get('/curso/delete/{id}', 'CursoController@delete')->name('excluir_curso');
