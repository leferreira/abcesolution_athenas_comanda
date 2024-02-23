<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\ComandaCategoria;
use App\Models\ComandaPedido;
use App\Models\Empresa;
use App\Models\Mesa;
use App\Models\PedidoComanda;
use App\Models\Vendedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dados["listaMesa"]      = ComandaPedido::where('online',"<>", 'S')->get();
        $dados["listaOnline"]    = ComandaPedido::where('online',"S")->get();
        $dados["categorias"]     = ComandaCategoria::get();
        return view("Pedido.Index", $dados);
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
            $usuario     = Auth::user();
            $mesa        = Mesa::find($id);
            if(!$mesa){
                throw new Exception("Mesa não encontrada ");
            }

            $pedido                = new stdClass;
            $pedido->mesa_id       = $mesa->id;
            $pedido->garcon_id     = session('tipo')== 'garcon' ? $usuario->garcon->id : null;
            $pedido->admin_id      = session('tipo')== 'admin' ? $usuario->admin->id : null;
            $pedido->empresa_id    = $usuario->empresa_id;
            $pedido->status_id     = config("constantes.status.ABERTO");
            $pedido->comanda_id    = $mesa->comanda_id;
            $pedido->online        = "N";
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
        if($pedido->online <> 'S'){
            Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);
        }
        return redirect()->route('mesa.index');
    }

    public function pedidoPronto($id )
    {

        $pedido = ComandaPedido::find($id);
        $pedido->status_id = config("constantes.status.PEDIDO_PRONTO");
        $pedido->save();
        if($pedido->online <> 'S'){
            Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);
        }

        return redirect()->route('cozinha.index');
    }

    public function entegarPedido($id )
    {
        $mesa = Mesa::find($id);
        $pedido = ComandaPedido::where(["comanda_id"=>$mesa->comanda_id])->first();
        $pedido->status_id = config("constantes.status.ENTREGUE");
        $pedido->save();
        if($pedido->online <> 'S'){
            Mesa::find($pedido->mesa_id)->update(["status_id"=> $pedido->status_id]);
        }

        return redirect()->route('mesa.index');
    }

    public function finalizarPedido($id )
    {
        $pedido = ComandaPedido::find($id);
       $pedido->status_id = config("constantes.status.FINALIZADO");
        $pedido->save();

        if($pedido->online <> 'S'){
            Mesa::find($pedido->mesa_id)->update(["status_id"=> config("constantes.status.ATIVO")]);
        }

        return redirect()->route('mesa.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $dados["pedido"]    = ComandaPedido::find($id);
        $dados["categorias"]= ComandaCategoria::get();
        return view("Pedido.Itens", $dados);
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
