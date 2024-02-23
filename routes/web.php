<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CozinhaController;
use App\Http\Controllers\GarconController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemPedidoClienteController;
use App\Http\Controllers\ItemPedidoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidoClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/logar', [LoginController::class, 'logar'])->name('login.logar');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, "index"] )->name("home");
Route::resource('cardapio', CardapioController::class);
Route::resource('cliente', ClienteController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/pedido/novo/{id}',[PedidoController::class,"novo"])->name("pedido.novo");
    Route::get('/pedido/enviarCozinha/{id}',[PedidoController::class,"enviarCozinha"])->name("pedido.enviarCozinha");
    Route::get('/pedido/pedidoPronto/{id}',[PedidoController::class,"pedidoPronto"])->name("pedido.pedidoPronto");
    Route::get('/pedido/entegarPedido/{id}',[PedidoController::class,"entegarPedido"])->name("pedido.entegarPedido");
    Route::get('/pedido/finalizarPedido/{id}',[PedidoController::class,"finalizarPedido"])->name("pedido.finalizarPedido");
    Route::resource('pedido', PedidoController::class);
    Route::resource('itempedido', ItemPedidoController::class);

    Route::resource('mesa', MesaController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('garcon', GarconController::class);
    Route::resource('cozinha', CozinhaController::class);
});




Route::get('/pedidocliente/enviarPedido/{id}',[PedidoClienteController::class,"enviarPedido"])->name("pedidocliente.enviarPedido");
Route::resource('pedidocliente', PedidoClienteController::class);

Route::resource('itempedidocliente', ItemPedidoClienteController::class);
