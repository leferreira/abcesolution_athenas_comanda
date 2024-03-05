<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryProdutoOpcao;
use App\Models\Produto;

class DeliveryProdutoController extends Controller{

    public function detalhe($id){
        $cliente_id             = session('usuario_delivery_logado')->id ?? null;
        if(!$cliente_id){
            return redirect()->route('deliverylogin.login')->with('msg_erro', "Você precisa está logado.");
        }
        $dados["produto"]       = Produto::find($id);
        $dados["opcoes"]        = DeliveryProdutoOpcao::where("produto_id",$id)->get();

        return view("Delivery.Produto.Detalhe", $dados);
    }

}
