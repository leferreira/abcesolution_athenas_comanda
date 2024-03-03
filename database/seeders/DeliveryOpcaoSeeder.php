<?php

namespace Database\Seeders;


use App\Models\DeliveryOpcao;
use App\Models\DeliveryOpcaoItem;
use Illuminate\Database\Seeder;

class DeliveryOpcaoSeeder extends Seeder
{

    public function run()
    {
       $opt1 = DeliveryOpcao::Create(['nome' =>'Tipo de Arroz',"tipo_id" => 1,"qtde_min" => 1 ,"qtde_max" => 1 ,"qtde_obrigatoria" => 1]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt1->id, 'nome' =>'ARROZ BRANCO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt1->id, 'nome' =>'ARROZ INTEGRAL',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt1->id, 'nome' =>'SEM ARROZ',"preco_adicional" => 0]);

        $opt2 = DeliveryOpcao::Create(['nome' =>'Feijão',"tipo_id" => 1,"qtde_min" => 1 ,"qtde_max" => 1,"qtde_obrigatoria" => 1]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt2->id, 'nome' =>'FEIJÃO CALDEADO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt2->id, 'nome' =>'FEIJÃO TROPEIRO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt2->id, 'nome' =>'SEM FEIJÃO',"preco_adicional" => 0]);

        $opt3 = DeliveryOpcao::Create(['nome' =>'Legumes',"tipo_id" => 1 ,"qtde_min" => 0 ,"qtde_max" => 1,"qtde_obrigatoria" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt3->id, 'nome' =>'BATATA SAUTÉ',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt3->id, 'nome' =>'LEGUMES AO FORNO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt3->id, 'nome' =>'SEM LEGUMES',"preco_adicional" => 0]);

       $opt4 = DeliveryOpcao::Create(['nome' =>'Carne / Proteína',"tipo_id" => 3 ,"qtde_min" => 1 ,"qtde_max" => 1,"qtde_obrigatoria" => 1]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'ALMONDEGAS AO MOLHO DE TOMATE',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'BIFE DE VACA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'FILE DE FRANGO GRELHADO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'FILÉ DE TILÁPIA À MILANESA ( 1 FATIA)',"preco_adicional" => 7.00]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'FILÉ DE TILÁPIA GRELHADA (1 FATIA)',"preco_adicional" => 7.00]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'FRICASSÊ',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'OMELETE',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'OVO FRITO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'SALMÃO GRELHADO',"preco_adicional" => 12.00]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt4->id, 'nome' =>'SEM CARNE',"preco_adicional" => 0]);

        $opt5 = DeliveryOpcao::Create(['nome' =>'Massa',"tipo_id" => 1 ,"qtde_min" => 1 ,"qtde_max" => 1,"qtde_obrigatoria" => 1]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt5->id, 'nome' =>'LASANHA A BOLONHESA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt5->id, 'nome' =>'MACARRÃO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt5->id, 'nome' =>'SEM MASSA',"preco_adicional" => 0]);

        $opt6 = DeliveryOpcao::Create(['nome' =>'Fritas',"tipo_id" => 1 ,"qtde_min" => 1 ,"qtde_max" => 1,"qtde_obrigatoria" => 1]);

            DeliveryOpcaoItem::Create(['opcao_id'=> $opt6->id, 'nome' =>'BANANA FRITA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt6->id, 'nome' =>'BATATA FRITA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt6->id, 'nome' =>'BOLINHO DE ARROZ RECHEADO COM QUEIJO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt6->id, 'nome' =>'MANDIOCA FRITA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt6->id, 'nome' =>'SEM FRITAS',"preco_adicional" => 0]);

        $opt7 = DeliveryOpcao::Create(['nome' =>'Salada',"tipo_id" => 2 ,"qtde_min" => 0 ,"qtde_max" => 2,"qtde_obrigatoria" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'ALFACE',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'BETERRABA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'BROCOLIS',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'CENOURA',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'COUVE FLOR',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'MAIONESE',"preco_adicional" => 4.0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'PEPINO',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'SALPICÃO',"preco_adicional" => 4.00]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'TOMATE',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'VINAGRETE',"preco_adicional" => 0]);
            DeliveryOpcaoItem::Create(['opcao_id'=> $opt7->id, 'nome' =>'SEM SALADA',"preco_adicional" => 0]);

     $opt8 =  DeliveryOpcao::Create(['nome' =>'Precisa de Talheres?',"tipo_id" => 1 ,"qtde_min" => 1 ,"qtde_max" => 1,"qtde_obrigatoria" => 1]);

       DeliveryOpcaoItem::Create(['opcao_id'=> $opt8->id, 'nome' =>'SIM, PRECISO DE TALHERES',"preco_adicional" => 0]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt8->id, 'nome' =>'NÃO PRECISO DE TALHERES',"preco_adicional" => 0]);

    $opt9 =   DeliveryOpcao::Create(['nome' =>'Vai um Refri para Acompanhar?',"tipo_id" => 3 ,"qtde_min" => 0 ,"qtde_max" => 10,"qtde_obrigatoria" => 0]);

       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'COCA-COLA MINI',"preco_adicional" => 3.00]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'COCA-COLA 310ML',"preco_adicional" => 4.90]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'FANTA LARANJA 310ML',"preco_adicional" => 4.90]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'SCHWEEPS LATA',"preco_adicional" => 4.90]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'H2O LIMÃO',"preco_adicional" => 5.50]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt9->id, 'nome' =>'H2O LIMONETO',"preco_adicional" => 5.50]);

    $opt10 =   DeliveryOpcao::Create(['nome' =>'Adicionais',"tipo_id" => 3 ,"qtde_min" => 0 ,"qtde_max" => 20,"qtde_obrigatoria" => 0]);

       DeliveryOpcaoItem::Create(['opcao_id'=> $opt10->id, 'nome' =>'FILÉ DE FRANGO +100 GRAMAS',"preco_adicional" => 4.00]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt10->id, 'nome' =>'BIFE BOVINO +100 GRAMAS',"preco_adicional" => 7.0]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt10->id, 'nome' =>'FILÉ DE TILÁPIA +100 GRAMAS',"preco_adicional" => 7.00]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt10->id, 'nome' =>'OVO FRITO ADICIONAL',"preco_adicional" => 2.50]);
       DeliveryOpcaoItem::Create(['opcao_id'=> $opt10->id, 'nome' =>'OMELETE 1 FATIA',"preco_adicional" => 4.00]);
    }
}

