<?php

namespace Database\Seeders;

use App\Models\DeliveryProdutoOpcao;
use Illuminate\Database\Seeder;

class DeliveryProdutoOpcaoSeeder extends Seeder
{

    public function run()
    {
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 1]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 2]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 3]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 4]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 5]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 6]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 7]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 8]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 9]);
        DeliveryProdutoOpcao::Create(['empresa_id' => 1,'produto_id' => 1,'opcao_id' => 10]);
    }
}
