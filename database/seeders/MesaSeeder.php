<?php

namespace Database\Seeders;

use App\Models\Mesa;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $j = 1;
        for($i=1; $i<=15;$i++){
            Mesa::Create(['nome' =>'Mesa ' . $i, "comanda_id" =>$j]);
            $j++;
        }



    }
}
