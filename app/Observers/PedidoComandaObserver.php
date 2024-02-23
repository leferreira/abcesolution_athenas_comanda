<?php

namespace App\Observers;

use App\Models\Comanda;
use App\Models\ComandaPedido;
use App\Models\Mesa;
use App\Models\PedidoComanda;

class PedidoComandaObserver
{
    public function created(ComandaPedido $pedido){
        if($pedido->online=='N'){
            Mesa::find($pedido->mesa_id)->update(["status_id" => config("constantes.status.ABERTO")]);
        }
    }


}
