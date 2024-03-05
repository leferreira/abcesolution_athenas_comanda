<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;

use App\Models\Categoria;
use App\Models\ComandaPedido;
use App\Models\DeliveryPedido;
use App\Models\LojaConfiguracao;
use App\Models\LojaPedido;
use App\Models\Parametro;
use App\Service\LojaService;
use App\Service\PedidoService;

class PagamentoController extends Controller{


    public function escolher($id){
        $pedido = ComandaPedido::find($id);

        session()->forget("delivery_pedido_id");
        session(["delivery_pedido_id"=>$pedido->id]);

        $dados["tipo"]          = "pix";
        $dados["pagamentoJs"]   = true;
        return view("Delivery.Pagamento.Index", $dados);
    }




    public function finalizarPedido($id){
        $pedido            = ComandaPedido::find($id) ;
        $pedido->status_id = config("constantes.status.NOVO");
        $pedido->save();

        session()->forget("delivery_pedido_id");

        return redirect()->route('delivery.home');
    }



}
