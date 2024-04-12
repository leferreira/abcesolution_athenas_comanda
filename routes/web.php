<?php

use App\Http\Controllers\Comanda\AdminController;
use App\Http\Controllers\Comanda\CardapioController;
use App\Http\Controllers\Comanda\ClienteController;
use App\Http\Controllers\Comanda\CozinhaController;
use App\Http\Controllers\Comanda\GarconController;
use App\Http\Controllers\Comanda\HomeController;
use App\Http\Controllers\Comanda\ItemPedidoClienteController;
use App\Http\Controllers\Comanda\ItemPedidoController;
use App\Http\Controllers\Comanda\LoginController;
use App\Http\Controllers\Comanda\MesaController;
use App\Http\Controllers\Comanda\PedidoClienteController;
use App\Http\Controllers\Comanda\PedidoController;
use App\Http\Controllers\Delivery\CartaoController;
use App\Http\Controllers\Delivery\ClienteWebController;
use App\Http\Controllers\Delivery\DeliveryCategoriaController;
use App\Http\Controllers\Delivery\DeliveryClienteController;
use App\Http\Controllers\Delivery\DeliveryItemPedidoController;
use App\Http\Controllers\Delivery\DeliveryLoginController;
use App\Http\Controllers\Delivery\DeliveryPedidoController;
use App\Http\Controllers\Delivery\DeliveryProdutoController;
use App\Http\Controllers\Delivery\HomeWebController;
use App\Http\Controllers\Delivery\PagamentoController;
use App\Http\Controllers\Delivery\PixController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/logar', [LoginController::class, 'logar'])->name('login.logar');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, "index"] )->name("home");
Route::resource('cardapio', CardapioController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('mesa', MesaController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/pedido/novo/{id}',[PedidoController::class,"novo"])->name("pedido.novo");
    Route::get('/pedido/enviarCozinha/{id}',[PedidoController::class,"enviarCozinha"])->name("pedido.enviarCozinha");
    Route::get('/pedido/pedidoPronto/{id}',[PedidoController::class,"pedidoPronto"])->name("pedido.pedidoPronto");
    Route::get('/pedido/entegarPedido/{id}',[PedidoController::class,"entegarPedido"])->name("pedido.entegarPedido");
    Route::get('/pedido/finalizarPedido/{id}',[PedidoController::class,"finalizarPedido"])->name("pedido.finalizarPedido");
    Route::resource('pedido', PedidoController::class);
    Route::resource('itempedido', ItemPedidoController::class);

    Route::resource('admin', AdminController::class);
    Route::resource('garcon', GarconController::class);
    Route::resource('cozinha', CozinhaController::class);
});


Route::get('/pedidocliente/novo/{id}',[PedidoClienteController::class,"novo"])->name("pedidocliente.novo");
Route::get('/pedidocliente/enviarPedido/{id}',[PedidoClienteController::class,"enviarPedido"])->name("pedidocliente.enviarPedido");
Route::resource('pedidocliente', PedidoClienteController::class);
Route::resource('itempedidocliente', ItemPedidoClienteController::class);

Route::get('/deliverylogin', [DeliveryLoginController::class, 'index'])->name('deliverylogin.login');
Route::post('/deliverylogin/logar', [DeliveryLoginController::class, 'logar'])->name('deliverylogin.logar');
Route::post('/deliverylogin/logout', [DeliveryLoginController::class, 'logout'])->name('deliverylogin.logout');

Route::resource('deliverycliente', DeliveryClienteController::class);
Route::group(['prefix'=>'delivery','as'=>'delivery.'], function () {
    Route::get('/',[HomeWebController::class, 'index'])->name('home');

    Route::resource('/deliverycategoria',DeliveryCategoriaController::class);

    Route::get('/deliveryproduto/detalhe/{id}',[DeliveryProdutoController::class,"detalhe"])->name("deliveryproduto.detalhe");

    Route::resource('/deliveryitempedido',DeliveryItemPedidoController::class);
    Route::resource('/deliveryproduto',DeliveryProdutoController::class);

    Route::get('/pagamento/finalizarPedido/{id}',[PagamentoController::class,"finalizarPedido"])->name("pagamento.finalizarPedido");

    Route::get('/deliverypedido',[DeliveryPedidoController::class,"index"])->name("deliverypedido.index");
    Route::get('/deliverypedido/pagamento/{id}',[DeliveryPedidoController::class,"pagamento"])->name("deliverypedido.pagamento");
    Route::post('/deliverypedido/salvar',[DeliveryPedidoController::class,"salvar"])->name("deliverypedido.salvar");
    Route::get('/deliverypedido/addItem/{pedido_id}/{produto_id}',[DeliveryPedidoController::class,"addItem"])->name("deliverypedido.addItem");

    Route::get('/cartao/ver/{id}',[CartaoController::class, 'ver'])->name('cartao.ver');
    Route::get('/pix/ver/{id}',[PixController::class, 'ver'])->name('pix.ver');


});



