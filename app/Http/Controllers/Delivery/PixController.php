<?php

namespace App\Http\Controllers\Delivery;

use App\Models\Categoria;
use App\Models\ComandaPedido;
use App\Models\DeliveryPedido;
use Illuminate\Routing\Controller;

class PixController extends Controller{

    public function ver($id){
        $dados["pedido"]        = ComandaPedido::find($id);
        $dados["tipo"]          = "pix";
        $dados["pagamentoJs"]   = true;
        return view("Delivery.Pagamento.Index", $dados);
    }

 }
