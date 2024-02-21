<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\CozinhaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemPedidoClienteController;
use App\Http\Controllers\ItemPedidoController;
use App\Http\Controllers\PedidoClienteController;
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

Route::get('/', [HomeController::class, "index"] )->name("home");
Route::get('/pedido/novo/{id}',[PedidoController::class,"novo"])->name("pedido.novo");
Route::get('/pedido/enviarCozinha/{id}',[PedidoController::class,"enviarCozinha"])->name("pedido.enviarCozinha");
Route::get('/pedido/pedidoPronto/{id}',[PedidoController::class,"pedidoPronto"])->name("pedido.pedidoPronto");
Route::get('/pedido/entegarPedido/{id}',[PedidoController::class,"entegarPedido"])->name("pedido.entegarPedido");
Route::get('/pedido/finalizarPedido/{id}',[PedidoController::class,"finalizarPedido"])->name("pedido.finalizarPedido");
Route::resource('pedido', PedidoController::class);
Route::resource('itempedido', ItemPedidoController::class);
Route::resource('cozinha', CozinhaController::class);
Route::resource('cardapio', CardapioController::class);


Route::get('/pedidocliente/enviarPedido/{id}',[PedidoClienteController::class,"enviarPedido"])->name("pedidocliente.enviarPedido");
Route::resource('pedidocliente', PedidoClienteController::class);

Route::resource('itempedidocliente', ItemPedidoClienteController::class);
