<?php

namespace Database\Seeders;


use App\Models\DeliveryCategoria;
use Illuminate\Database\Seeder;

class CategoriaDeliverySeeder extends Seeder
{

    public function run()
    {
        DeliveryCategoria::Create(['categoria' =>'Marmitex',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Porções',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Refrigerante Lata',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Sucos',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Cervejas',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Doces',"status_id" => config("constantes.status.ATIVO")]);
        DeliveryCategoria::Create(['categoria' =>'Sorvetes',"status_id" => config("constantes.status.ATIVO")]);
    }
}
