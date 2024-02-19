<?php

namespace Database\Seeders;

use App\Models\ComandaCategoria;
use App\Models\Mesa;
use Illuminate\Database\Seeder;

class CategoriaComandaSeeder extends Seeder
{

    public function run()
    {
        ComandaCategoria::Create(['categoria' =>'Pizza',"status_id" => config("constantes.status.ATIVO")]);
        ComandaCategoria::Create(['categoria' =>'Hambúrguer',"status_id" => config("constantes.status.ATIVO")]);
        ComandaCategoria::Create(['categoria' =>'Hot Dog',"status_id" => config("constantes.status.ATIVO")]);
        ComandaCategoria::Create(['categoria' =>'Bebida',"status_id" => config("constantes.status.ATIVO")]);
        ComandaCategoria::Create(['categoria' =>'Porções',"status_id" => config("constantes.status.ATIVO")]);
    }
}
