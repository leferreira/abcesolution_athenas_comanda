<?php

namespace App\Http\Controllers;

use App\Models\ComandaCategoria;
use App\Models\Empresa;
use App\Models\ItemPedidoComanda;
use App\Models\PedidoComanda;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use stdClass;

class ItemPedidoController extends Controller
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
        try {
            $empresa = Empresa::first();
            $produto = Produto::find($request->produto_id);
            $item = new stdClass;
            $item->pedido_id     = $request->pedido_id;
            $item->quantidade    = ($request->quantidade) ? $request->quantidade :1 ;
            $item->produto_id    = $request->produto_id;
            $item->valor         = $produto->valor_venda;
            $item->subtotal      = $produto->valor_venda * $item->quantidade;
            $item->empresa_id    = $empresa->id;
            $item->status_id     = config("constantes.status.ABERTO");
            $item->identificacao = $request->identificacao;
            $item->data_abertura = hoje();
            $item->hora_abertura = agora();
            $item = ItemPedidoComanda::create(objToArray($item));

            return redirect()->back()->with('msg_sucesso', "item apagado com sucesso.");

        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {

        $dados["Pedido"]    = PedidoComanda::find($id);
        $dados["categorias"]= ComandaCategoria::get();
        return view("Pedido.Itens", $dados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PedidoComanda $Pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $h = ItemPedidoComanda::find($id);
            if($h){
                $h->delete();
            }
            PedidoComanda::somarTotal($h->Pedido_id);
            return redirect()->back()->with('msg_sucesso', "item apagado com sucesso.");
        }catch (\Exception $e){
            return redirect()->back()->with('msg_erro', "Erro: " . $e->getMessage());
        }
    }
}
