<?php

namespace App\Providers;

use App\Models\Comanda;
use App\Models\ComandaItemPedido;
use App\Models\ComandaPedido;
use App\Models\ItemComanda;
use App\Models\ItemPedidoComanda;
use App\Models\Mesa;
use App\Models\PedidoComanda;
use App\Observers\ComandaObserver;
use App\Observers\ItemComandaObserver;
use App\Observers\ItemPedidoObserver;
use App\Observers\PedidoComandaObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ComandaPedido::observe(PedidoComandaObserver::class);
        ComandaItemPedido::observe(ItemPedidoObserver::class);
    }
}
