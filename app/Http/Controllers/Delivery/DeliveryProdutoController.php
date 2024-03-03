<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryProdutoOpcao;
use App\Models\Produto;

class DeliveryProdutoController extends Controller{

    public function detalhe($id){
        $dados["produto"]       = Produto::find($id);
        $dados["opcoes"]        = DeliveryProdutoOpcao::where("produto_id",$id)->get();
       /* foreach($dados["opcoes"] as $op){
            echo ($op->opcao->nome);
            foreach($op->opcao->itens as $it){
                i($it);
            }
        }

        exit;*/
        return view("Delivery.Produto.Detalhe", $dados);
    }

}
