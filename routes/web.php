<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
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

Route::resource('alunos', AlunoController::class);
Route::get('alunos/buscarturmas/{escola}/{ano}',[AlunoController::class, 'buscarTurmas']);
Route::get('alunos/buscaralunos/{ano}/{escola}/{turma}',[AlunoController::class,'buscarAlunos']);
