<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Comanda;
use App\Models\ComandaCategoria;
use App\Models\ComandaItemPedido;
use App\Models\ComandaItemPedidoCliente;
use App\Models\ComandaPedido;
use App\Models\ComandaPedidoCliente;
use App\Models\Empresa;
use App\Models\ItemPedidoComanda;
use App\Models\Mesa;
use App\Models\PedidoComanda;
use App\Models\Produto;
use App\Models\Vendedor;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class PedidoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario     = Auth::user();
        $cliente = $usuario->cliente ?? null;
        if(!$cliente){
            return redirect()->route('cardapio.index');
        }

        $dados["lista"]     = ComandaPedido::where("cliente_id",$cliente->id)->get();
        $dados["categorias"]= ComandaCategoria::get();
        return view("Comanda.Cardapio.Pedido.index", $dados);
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
            $mesa                   = Mesa::find($id);


            if(!$mesa){
                throw new Exception("Mesa não encontrada ");
            }

            if($mesa->status_id != config("constantes.status.ATIVO")){
                throw new Exception("Mesa Ocupada ");
            }

            $pedido                = new stdClass;
            $pedido->mesa_id       = $mesa->id;
            $pedido->garcon_id     = null;
            $pedido->admin_id      = null;
            $pedido->empresa_id    = $mesa->empresa_id;
            $pedido->status_id     = config("constantes.status.ABERTO");
            $pedido->comanda_id    = $mesa->comanda_id;
            $pedido->tipo_pedido   = config("constantes.tipo_pedido.COMANDA_CLIENTE");
            $pedido->data_abertura = hoje();
            $pedido->hora_abertura = agora();

            $pedido                = ComandaPedido::create(objToArray($pedido));

            return redirect()->route('pedidocliente.edit', $pedido->id);

        } catch (\Exception $e) {
            return redirect()->back()->with('msg_erro', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {

            $usuario     = Auth::user();
            $cliente = $usuario->cliente ?? null;
            if(!$cliente){
                throw new Exception("Selecione  um Cliente");
            }

            $pedido = new stdClass;
            $pedido->cliente_id    = $cliente->id ;
            $pedido->empresa_id    = $usuario->empresa_id;
            $pedido->status_id     = config("constantes.status.ABERTO");
            $pedido->data_abertura = hoje();
            $pedido->hora_abertura = agora();
            $pedido->tipo_pedido   = config("constantes.tipo_pedido.COMANDA_CLIENTE");
            $pedido                = ComandaPedido::create(objToArray($pedido));

            if($pedido){
                $produto             = Produto::find($request->produto_id);
                $item                = new stdClass;
                $item->pedido_id     = $pedido->id;
                $item->quantidade    = ($request->quantidade) ? $request->quantidade :1 ;
                $item->produto_id    = $request->produto_id;
                $item->valor         = $produto->valor_venda;
                $item->subtotal      = $produto->valor_venda * $item->quantidade;
                $item->status_id     = config("constantes.status.ABERTO");
                $item->data_abertura = hoje();
                $item->hora_abertura = agora();
                $item = ComandaItemPedido::create(objToArray($item));
            }

            return redirect()->route('pedidocliente.edit', $pedido->id)->with('msg_sucesso', "Pedido Inserido com sucesso.");

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

    public function enviarPedido($id )
    {
        $pedido            = ComandaPedido::find($id);
        $pedido->status_id = config("constantes.status.NOVO");
        $pedido->save();

        return redirect()->route('cardapio.index');
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
        return view("Comanda.Cardapio.Pedido.Itens", $dados);
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
