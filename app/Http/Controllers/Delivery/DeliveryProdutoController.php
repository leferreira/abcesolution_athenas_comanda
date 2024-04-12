<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaPedido;
use App\Models\DeliveryProdutoOpcao;
use App\Models\Produto;

class DeliveryProdutoController extends Controller{
    protected $delivery_pedido_id ;
    protected $cliente_id ;

    public function detalhe($id){
        $this->delivery_pedido_id   = session('delivery_pedido_id') ?? null;
        $this->cliente_id           = session('usuario_delivery_logado')->id ?? null;

        if(!$this->cliente_id){
            return redirect()->route('deliverylogin.login')->with('msg_erro', "Você precisa está logado.");
        }

        $dados["produto"]       = Produto::find($id);
        $dados["opcoes"]        = DeliveryProdutoOpcao::where("produto_id",$id)->get();
        $dados["pedido"]        = ComandaPedido::find($this->delivery_pedido_id);

        return view("Delivery.Produto.Detalhe", $dados);
    }

}
