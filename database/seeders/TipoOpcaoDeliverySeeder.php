<?php

namespace Database\Seeders;


use App\Models\DeliveryCategoria;
use App\Models\DeliveryTipoSelecao;
use Illuminate\Database\Seeder;

class TipoOpcaoDeliverySeeder extends Seeder
{

    public function run()
    {
        DeliveryTipoSelecao::Create(['tipo' =>'radio']);
        DeliveryTipoSelecao::Create(['tipo' =>'check']);
        DeliveryTipoSelecao::Create(['tipo' =>'qtde']);
    }
}
