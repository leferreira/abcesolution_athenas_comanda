<?php

namespace Database\Seeders;
use App\Models\DeliveryProdutoCategoria;
use Illuminate\Database\Seeder;

class CategoriaDeliveryProdutoSeeder extends Seeder
{

    public function run()
    {
       DeliveryProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 1]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 2]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 3]);

       DeliveryProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 4]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 5]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 6]);

       DeliveryProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 7]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 8]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 9]);

       DeliveryProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 10]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 11]);
       DeliveryProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 12]);
    }
}
