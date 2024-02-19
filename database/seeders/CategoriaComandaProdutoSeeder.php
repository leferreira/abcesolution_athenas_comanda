<?php

namespace Database\Seeders;

use App\Models\ComandaCategoria;
use App\Models\ComandaProdutoCategoria;
use App\Models\Mesa;
use Illuminate\Database\Seeder;

class CategoriaComandaProdutoSeeder extends Seeder
{

    public function run()
    {
       ComandaProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 1]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 2]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'1',"produto_id" => 3]);

       ComandaProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 4]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 5]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'2',"produto_id" => 6]);

       ComandaProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 7]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 8]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'3',"produto_id" => 9]);

       ComandaProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 10]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 11]);
       ComandaProdutoCategoria::Create(['categoria_id' =>'4',"produto_id" => 12]);
    }
}
