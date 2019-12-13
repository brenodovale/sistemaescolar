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

//Route::get('/matriculas/{id}', 'MatriculaController@show');
Route::resource('/matdisciplinas', 'MatdisciplinaController');

Route::resource('/disciplinas', 'DisciplinaController');

Route::resource('/turmas', 'TurmaController');
		
Route::resource('/semestres', 'SemestreController');
	
Route::resource('/alunos', 'AlunoController');

Route::resource('/cursos', 'CursoController');

Route::resource('/professores', 'ProfessorController');	

Route::resource('/matriculas', 'MatriculaController');

Route::resource('/notas', 'NotaController');


//Route::get('/', function () {
  //  return view('templates.template');
//});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/sair', 'HomeController@sair')->name('sair');
