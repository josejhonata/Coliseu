<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\FichaTreinoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cliente', function () {
    return view('cliente');
})->middleware(['auth'])->name('cliente');

Route::get('/professor', function () {
    return view('professor');
})->middleware(['auth'])->name('professor');

Route::get('/professor/delete/{ficha_treino}',[FichaTreinoController::class, 'destroy'])->name('rm-ficha');

Route::post('/cadastro',[RegisteredUserController::class, 'store'])->name('registro');
Route::post('/professor/ficha',[FichaTreinoController::class, 'store'])->name('add-ficha');

require __DIR__.'/auth.php';
