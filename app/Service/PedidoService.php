<?php
namespace App\Service;

use App\Models\DeliveryOpcao;

class PedidoService{
    public static function verificaOpcoes($dados){
         // Agrupar as seleções por opcao_id
         $groupedSelections = collect($dados)->groupBy('opcao_id');

         // Obter todas as opções de delivery
         $deliveryOptions = DeliveryOpcao::with('itens')->get();

         $validationResults = [];
         $erros = [];

         foreach ($deliveryOptions as $option) {
             $opcaoId = $option->id;
             $selectedItems = $groupedSelections->get($opcaoId, collect());

             // Calcular a quantidade total selecionada para esta opção
             $totalSelected = $selectedItems->sum('qtde');

             // Verificar se a quantidade obrigatória foi satisfeita e não ultrapassou a máxima
             $filledCorrectly = $totalSelected >= $option->qtde_obrigatoria;
             if(!$filledCorrectly){
                $opcao  = DeliveryOpcao::find($opcaoId);
                $erro  = "A opção " . $opcao->nome . " precisa ter pelos menos " . $opcao->qtde_obrigatoria . " opção preenchida";
                return $erro;
             }
             $maxNotExceeded  = $totalSelected <= $option->qtde_max;
             if(!$maxNotExceeded){
                $opcao    = DeliveryOpcao::find($opcaoId);
                $erro      = "A opção " . $opcao->nome . " deve ser prenchida com no máximo " .$opcao->qtde_max . " opções";
                return $erro;
            }

            }

            return false;
        }
}
