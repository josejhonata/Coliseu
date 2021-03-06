<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\FichaTreinoController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ExercicioController;
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

Route::get('/atendente/cadastroprofessor', function () {
    
    return view('cadastroprofessor');

})->middleware(['auth'])->name('cadastroprofessor');

Route::get('/atendente/cadastroaluno', function () {
   
       return view('cadastroaluno');
   
})->middleware(['auth'])->name('cadastroaluno');

Route::get('/atendente/cadastroequipamento', function () {
	    
    return view('cadastroequipamento');
    
})->middleware(['auth'])->name('cadastroequipamento');

Route::get('/cadastroficha', function () {
    
        return view('cadastroficha');       
      
})->middleware(['auth'])->name('cadastroficha');


Route::get('/cadastroexercicio', function () {
    
        return view('cadastroexercicio');       
      
})->middleware(['auth'])->name('cadastroexercicio');

Route::get('/exercicio/{exer}', function () {
    
        return view('exercicio');       
      
})->middleware(['auth'])->name('exercicio');


Route::get('/professor/editar/{ficha_treino}', function () {
    
        return view('editficha');       
      
})->middleware(['auth'])->name('edit-ficha');

Route::get('/atendente/editar/{equipamento}', function () {
    
        return view('editequipamento');       
      
})->middleware(['auth'])->name('edit-equipamento');

Route::get('/atendente/{User}', function () {
    
        return view('edituser');       
      
})->middleware(['auth'])->name('edit-user');

Route::get('/cliente/{User}', function () {
    
        return view('visualizaruser');       
      
})->middleware(['auth'])->name('visu-user');

Route::put('/professor/update/{ficha_treino}', [FichaTreinoController::class, 'update'])->name('update-ficha')->middleware(['auth']);

Route::put('/atendente/update/{equipamento}', [EquipamentoController::class, 'update'])->name('update-equipamento')->middleware(['auth']);

Route::put('/atendente/{User}', [RegisteredUserController::class, 'update'])->name('update-user')->middleware(['auth']);


Route::get('/professor/delete/{ficha_treino}',[FichaTreinoController::class, 'destroy'])->name('rm-ficha');

Route::get('/equipamento/delete/{equipamento}',[EquipamentoController::class, 'destroy'])->name('rm-equipamento');

Route::get('/cadastroexercicio/delete/{exercicio}',[ExercicioController::class, 'destroy'])->name('rm-exercicio');

Route::get('/cadastrouser/delete/{User}',[RegisteredUserController::class, 'destroy'])->name('rm-user');

Route::post('/cadastro',[RegisteredUserController::class, 'store'])->name('registro');
Route::post('/cadastroficha',[FichaTreinoController::class, 'store'])->name('add-ficha');
Route::post('/cadastroexercicio',[ExercicioController::class, 'store'])->name('add-exercicio');
Route::post('/cadastro/equipamento',[EquipamentoController::class, 'store'])->name('add-equipamento');

require __DIR__.'/auth.php';
