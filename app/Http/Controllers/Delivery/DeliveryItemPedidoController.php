<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaItemPedido;
use App\Models\ComandaPedido;
use App\Models\DeliveryItemPedido;
use App\Models\DeliveryOpcaoEscolhida;
use App\Models\DeliveryPedido;
use Illuminate\Http\Request;

class DeliveryItemPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ComandaItemPedido::find($id);
        $pedido_id = $item->pedido_id;
        if($item){
            DeliveryOpcaoEscolhida::where("item_pedido_id", $id)->delete();
            $item->delete();
        }

        $pedido = ComandaPedido::find($pedido_id);
        if(count($pedido->itens)<=0){
            $pedido->delete();
            session()->forget("delivery_pedido_id");
        }
        return redirect()->route('delivery.home');
    }
}
