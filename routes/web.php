<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('tela');
});

Route::get('/fornecedor', [FornecedorController::class,'index'])->name('fornecedor.index');
Route::post('/fornecedor/store', [FornecedorController::class,'store'])->name('fornecedor.store');
Route::post('/fornecedor/search',[FornecedorController::class, 'search'])->name('fornecedor.search');
Route::get('/fornecedor/create', [FornecedorController::class,'create'])->name('fornecedor.create');
Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit'])->name('fornecedor.edit');
Route::put('/fornecedor/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
Route::delete('fornecedor/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');


Route::get('/cliente', [ClienteController::class,'index'])->name('cliente.index');
Route::post('/cliente/store', [clienteController::class,'store'])->name('cliente.store');
Route::post('/cliente/search',[clienteController::class, 'search'])->name('cliente.search');
Route::get('/cliente/create', [ClienteController::class,'create'])->name('cliente.create');
Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');


/*
Route::get('/fornecedor', function () {
    return view ('fornecedor.list');
});
*/
