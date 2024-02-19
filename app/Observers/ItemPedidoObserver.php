<?php

namespace App\Observers;

use App\Models\Comanda;
use App\Models\ItemComanda;
use App\Models\ItemPedidoComanda;
use App\Models\Mesa;
use App\Models\PedidoComanda;

class ItemPedidoObserver
{
    public function created(ItemPedidoComanda $item){
        PedidoComanda::somarTotal($item->pedido_id);
    }

    public function deleted(ItemPedidoComanda $item){
        PedidoComanda::somarTotal($item->pedido_id);

    }
}
