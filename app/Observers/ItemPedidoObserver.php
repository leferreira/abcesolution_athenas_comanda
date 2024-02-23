<?php

namespace App\Observers;

use App\Models\Comanda;
use App\Models\ComandaItemPedido;
use App\Models\ComandaPedido;
use App\Models\ItemComanda;
use App\Models\ItemPedidoComanda;
use App\Models\Mesa;
use App\Models\PedidoComanda;

class ItemPedidoObserver
{
    public function created(ComandaItemPedido $item){
        ComandaPedido::somarTotal($item->pedido_id);
    }

    public function deleted(ComandaItemPedido $item){
        ComandaPedido::somarTotal($item->pedido_id);

    }
}
