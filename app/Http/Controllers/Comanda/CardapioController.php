<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use App\Models\ComandaCategoria;
use App\Models\ComandaPedido;
use App\Models\Empresa;
use App\Models\Mesa;
use App\Models\PedidoComanda;
use App\Models\Vendedor;
use Exception;
use Illuminate\Http\Request;
use stdClass;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$dados["categorias"]= ComandaCategoria::get();
        return view("Comanda.Cardapio.home", $dados);*/
        $dados["mesas"] = Mesa::get();
        return view("Comanda.Cardapio.mesa", $dados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function novo($id)
    {
        try {
            $vendedor = Vendedor::first();
            $empresa  = Empresa::first();
            $mesa     = Mesa::find($id);

            if(!$vendedor){
                throw new Exception("Cadastre um vendedor");
            }

            if(!$mesa){
                throw new Exception("Mesa não encontrada ");
            }

            $pedido = new stdClass;
            $pedido->mesa_id       = $mesa->id;
            $pedido->vendedor_id   = $vendedor->id;
            $pedido->empresa_id    = $empresa->id;
            $pedido->status_id     = config("constantes.status.ABERTO");
            $pedido->comanda_id    = $mesa->comanda_id;
            $pedido->data_abertura = hoje();
            $pedido->hora_abertura = agora();
            $pedido                = ComandaPedido::create(objToArray($pedido));

            return redirect()->route('pedido.edit', $pedido->id)->with('msg_sucesso', "Cliente Inserido com sucesso.");

        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $vendedor = Vendedor::first();
            $empresa = Empresa::first();

            if(!$vendedor){
                throw new Exception("Cadastre um vendedor");
            }
            $comanda = new stdClass;
            $comanda->mesa_id       = $request->mesa_id;
            $comanda->vendedor_id   = $vendedor->id;
            $comanda->empresa_id    = $empresa->id;
            $comanda->status_id     = config("constantes.status.ABERTO");
            $comanda->identificacao = $request->identificacao;
            $comanda->data_abertura = hoje();
            $comanda->hora_abertura = agora();
            $comanda = Comanda::create(objToArray($comanda));

            return redirect()->route('pedido.show', $comanda->id)->with('msg_sucesso', "Cliente Inserido com sucesso.");

        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {
        $mesa = Mesa::find($id);
        $pedido = ComandaPedido::where(["comanda_id"=>$mesa->comanda_id])->first();
        return redirect()->route('pedido.edit', $pedido->id);
    }

    public function enviarCozinha($id )
    {
        $pedido = ComandaPedido::find($id);
        $pedido->status_id = config("constantes.status.ENVIADO_PARA_COZINHA");
        $pedido->save();
        Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);
        return redirect()->route('home');
    }

    public function pedidoPronto($id )
    {

        $pedido = ComandaPedido::find($id);
        $pedido->status_id = config("constantes.status.PEDIDO_PRONTO");
        $pedido->save();

        Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);

        return redirect()->route('home');
    }

    public function entegarPedido($id )
    {
        $mesa = Mesa::find($id);
        $pedido = ComandaPedido::where(["comanda_id"=>$mesa->comanda_id])->first();
        $pedido->status_id = config("constantes.status.ENTREGUE");
        $pedido->save();

        Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);

        return redirect()->route('home');
    }

    public function finalizarPedido($id )
    {
        $pedido = ComandaPedido::find($id);
        $pedido->status_id = config("constantes.status.FINALIZADO");
        $pedido->save();

        Mesa::find($pedido->mesa_id)->update(["status_id"=> config("constantes.status.ABERTO")]);

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $dados["pedido"]    = ComandaPedido::find($id);
        $dados["categorias"]= ComandaCategoria::get();
        return view("Comanda.Comanda.Itens", $dados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comanda $comanda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comanda $comanda)
    {
        //
    }
}
