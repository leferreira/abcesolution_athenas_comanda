<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaCategoria;
use App\Models\ComandaPedido;
use App\Models\DeliveryCategoria;
use App\Models\DeliveryPedido;
use App\Models\DeliveryProdutoCategoria;
use App\Models\Produto;


class HomeWebController extends Controller{
    protected $delivery_pedido_id ;
    protected $cliente_id ;

    public function index(){
        $this->delivery_pedido_id   = session('delivery_pedido_id') ?? null;
        $this->cliente_id           = session('usuario_delivery_logado')->id ?? null;

        $dados["produtos"]          = DeliveryProdutoCategoria::limit(15)->get();
        $dados["categorias"]        = DeliveryCategoria::get();
        $dados["pedido"]            = ComandaPedido::find($this->delivery_pedido_id);

        return view("Delivery.home", $dados);
    }
}
