<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaCliente;
use App\Models\ComandaItemPedido;
use App\Models\DeliveryItemPedido;
use App\Models\DeliveryOpcao;
use App\Models\DeliveryOpcaoEscolhida;
use App\Models\ComandaPedido;
use App\Models\DeliveryProdutoOpcao;
use App\Models\Produto;
use App\Models\ProdutoDelivery;
use App\Service\PedidoService;
use Illuminate\Http\Request;
use stdClass;

class DeliveryPedidoController extends Controller
{
    public function pagamento($id){
        $dados["pedido"]        = ComandaPedido::find($id);
        $dados["tipo"]          = "pix";
        $dados["pagamentoJs"]   = true;
        return view("Delivery.Pagamento.Index", $dados);
    }

    public function salvar(Request $request){
        $cliente_id     = session('usuario_delivery_logado')->id ?? null;
        $cliente_id     = ComandaCliente::first()->id;
        $retorno        = new stdClass;
        $req            = (object) $request->all(); // ou $request->input('selections') se os dados vierem em uma chave 'selections'
        $valores        = $req->valores ?? null;
        $retorno->tem_erro =  false;
        $produto        = Produto::find($req->produto_id);
        $opcoes         = DeliveryProdutoOpcao::where("produto_id", $request->produto_id )->get();

        if(count($opcoes) > 0){
            $verificado = PedidoService::verificaOpcoes($req->valores);
            if($verificado){
                $retorno->tem_erro  =  true;
                $retorno->erro      =  $verificado;
                return response()->json($retorno);
            }
        }

        if(!$request->pedido_id){
            $pedido = new stdClass;
            $pedido->cliente_id    = $cliente_id ;
            $pedido->status_id     = config("constantes.status.ABERTO");;
            $pedido->tipo_pedido   = config("constantes.tipo_pedido.DELIVERY");
            $pedido->data_abertura = hoje();
            $pedido->hora_abertura = agora();
            $pedido = ComandaPedido::Create(objToArray($pedido));
            session()->forget("delivery_pedido_id");
            session(["delivery_pedido_id"=>$pedido->id]);
            $dados["delivery_pedido_id"] = $pedido->id;
        }else{
            $pedido = ComandaPedido::find($request->pedido_id);
        }


        if($pedido){
            $item = new stdClass;
            $item->pedido_id  = $pedido->id;
            $item->produto_id = $req->produto_id;
            $item->quantidade = 1;
            $item->valor = $produto->valor_venda;
            $item->subtotal = $produto->valor_venda;
            $item->subtotal_liquido = $produto->valor_venda;


            $item = ComandaItemPedido::Create(objToArray($item));
            if($item){
                foreach($valores as $valor){
                    $op = new stdClass;
                    $op->pedido_id      = $pedido->id;
                    $op->item_pedido_id = $item->id;
                    $op->produto_id     = $produto->id;
                    $op->opcao_id       = $valor["opcao_id"];
                    $op->opcao_item_id  = $valor["item_id"];
                    $op->quantidade     = $valor["qtde"];
                    $op->valor          = $valor["value"];

                    DeliveryOpcaoEscolhida::Create(objToArray($op));
                }
            }
        }

        return response()->json($retorno);



    }
    public function addItem($pedido_id, $produto_id){
            $produto                = Produto::find($produto_id);
            $item                   = new stdClass;
            $item->pedido_id        = $pedido_id;
            $item->produto_id       = $produto_id;
            $item->quantidade       = 1;
            $item->valor            = $produto->valor_venda;
            $item->subtotal         = $produto->valor_venda;
            $item->subtotal_liquido = $produto->valor_venda;

            $item                   = ComandaItemPedido::Create(objToArray($item));
            if($item){
                $opcoes             = DeliveryOpcaoEscolhida::where(["produto_id"=> $produto_id, "pedido_id" => $pedido_id ] )->get();
                foreach($opcoes as $valor){
                    $op                 = new stdClass;
                    $op->pedido_id      = $valor->pedido_id;
                    $op->item_pedido_id = $item->id;
                    $op->produto_id     = $produto->id;
                    $op->opcao_id       = $valor->opcao_id;
                    $op->opcao_item_id  = $valor->opcao_item_id;
                    $op->quantidade     = $valor->quantidade;
                    $op->valor          = $valor->valor;

                    DeliveryOpcaoEscolhida::Create(objToArray($op));
                }
            }

            return redirect()->route('delivery.home');
    }

    public function finalizarPedido($id){
        $pedido            = ComandaPedido::find($id) ;
        $pedido->status_id = config("constantes.status.NOVO");
        $pedido->save();

        return redirect()->route('delivery.home');
    }



}
