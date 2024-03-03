<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryItemPedido;
use App\Models\DeliveryOpcao;
use App\Models\DeliveryOpcaoEscolhida;
use App\Models\DeliveryPedido;
use App\Models\DeliveryProdutoOpcao;
use App\Models\Produto;
use App\Models\ProdutoDelivery;
use App\Service\PedidoService;
use Illuminate\Http\Request;
use stdClass;

class DeliveryPedidoController extends Controller
{
    public function salvar(Request $request){
        $retorno = new stdClass;
        $req     = (object) $request->all(); // ou $request->input('selections') se os dados vierem em uma chave 'selections'
        $valores = $req->valores ?? null;
        $retorno->tem_erro =  false;
        $verificado = PedidoService::verificaOpcoes($req->valores);
        if($verificado){
            $retorno->tem_erro =  true;
            $retorno->erro =  $verificado;
            return response()->json($retorno);
        }

        $pedido = new stdClass;
        $pedido->cliente_id = 1;
        $pedido->status_id = 1;
        $pedido->data_pedido = hoje();
        $pedido = DeliveryPedido::Create(objToArray($pedido));

        $produto  = Produto::find($req->produto_id);
        if($pedido){
            $item = new stdClass;
            $item->pedido_id  = $pedido->id;
            $item->produto_id = $req->produto_id;
            $item->quantidade = 1;
            $item->valor = $produto->valor_venda;
            $item->subtotal = $produto->valor_venda;
            $item->subtotal_liquido = $produto->valor_venda;

            $item = DeliveryItemPedido::Create(objToArray($item));
            if($item){
                foreach($valores as $valor){
                    $op = new stdClass;
                    $op->pedido_id         = $pedido->id;
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

    public function salvar3(Request $request)
    {
        $selections = $request->all(); // Contém todos os itens enviados na requisição

        // Agrupa as seleções por opcao_id
        $groupedSelections = collect($selections)->groupBy('opcao_id');

        // Obtém todas as opções de delivery que têm uma quantidade obrigatória
        $deliveryOptions = DeliveryOpcao::all();

        // Prepara um array para armazenar os resultados da validação
        $validationResults = [];

        foreach ($deliveryOptions as $option) {
            // Obtém todas as seleções para esta opção específica
            $selectedItems = $groupedSelections->get($option->id, collect());

            // Calcula a quantidade total selecionada para esta opção
            $totalSelected = $selectedItems->sum('qtde');

            // Verifica se a quantidade obrigatória foi satisfeita
            $filledCorrectly = $totalSelected >= $option->qtde_obrigatoria;

            // Verifica se a quantidade máxima não foi excedida
            $maxNotExceeded = $totalSelected <= $option->qtde_max;

            // Se a opção é obrigatória e nenhum item foi selecionado, então há um erro
            $hasError = $option->qtde_obrigatoria > 0 && $totalSelected === 0;

            // Adiciona o resultado da validação para a opção
            $validationResults[$option->id] = [
                'filled_correctly' => $filledCorrectly,
                'max_not_exceeded' => $maxNotExceeded,
                'has_error' => $hasError,
            ];
        }

        // Retorna os resultados da validação
        return response()->json($validationResults);
    }



    public function salvar4(Request $request)
    {
        $selections = $request->all(); // Contém todos os itens enviados na requisição
        $groupedSelections = collect($selections)->groupBy('opcao_id'); // Agrupa por opcao_id

        // Obter todas as opções que requerem seleção
        $deliveryOptions = DeliveryOpcao::where('qtde_obrigatoria', '>', 0)->get();

        $validationResults = [];

        foreach ($deliveryOptions as $option) {
            $opcaoId = $option->id;
            $selectedItems = $groupedSelections->get($opcaoId);

            // Verifica se alguma seleção foi feita para a opção obrigatória
            $hasSelection = $selectedItems && !$selectedItems->isEmpty();

            // Soma as quantidades selecionadas para a opção
            $totalSelected = $hasSelection ? $selectedItems->sum('qtde') : 0;

            // Verifica se a quantidade obrigatória foi atendida e não ultrapassou a máxima
            $filledCorrectly = $hasSelection && $totalSelected >= $option->qtde_obrigatoria;
            $maxNotExceeded = $totalSelected <= $option->qtde_max;

            // Se nenhuma seleção foi feita e a opção é obrigatória, é um erro
            if (!$hasSelection && $option->qtde_obrigatoria > 0) {
                $filledCorrectly = false;
                $maxNotExceeded = false;
            }

            $validationResults[$opcaoId] = [
                'filled_correctly' => $filledCorrectly,
                'max_not_exceeded' => $maxNotExceeded,
                'total_selected' => $totalSelected,
                'required_quantity' => $option->qtde_obrigatoria
            ];
        }

        return response()->json($validationResults);
    }



}
