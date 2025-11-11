<?php

use App\Http\Controllers\ClienteController;
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
    return view('welcome');
});

Route::get('/cliente', [ClienteController::class,'index'])->name('cliente.index');
Route::post('/cliente/store', [clienteController::class,'store'])->name('cliente.store');
Route::post('/cliente/search',[clienteController::class, 'search'])->name('cliente.search');
Route::get('/cliente/create', [ClienteController::class,'create'])->name('cliente.create');
Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

Route::get('/produto', [ProdutoController::class,'index'])->name('produto.index');
Route::post('/produto/store', [ProdutoController::class,'store'])->name('produto.store');
Route::post('/produto/search',[ProdutoController::class, 'search'])->name('produto.search');
Route::get('/produto/create', [ProdutoController::class,'create'])->name('produto.create');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
/*
Route::get('/cliente', function () {
    return view ('cliente.list');
});
*/
