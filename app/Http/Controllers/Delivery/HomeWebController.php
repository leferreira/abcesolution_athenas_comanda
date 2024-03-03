<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaCategoria;
use App\Models\DeliveryCategoria;
use App\Models\DeliveryPedido;
use App\Models\DeliveryProdutoCategoria;
use App\Models\Produto;


class HomeWebController extends Controller
{
    public function index(){

        $dados["produtos"]      = DeliveryProdutoCategoria::limit(15)->get();
        $dados["categorias"]    = DeliveryCategoria::get();
        $pedido_id = 11;
        $dados["pedido"] = DeliveryPedido::find($pedido_id);
        return view("Delivery.home", $dados);
    }
}
