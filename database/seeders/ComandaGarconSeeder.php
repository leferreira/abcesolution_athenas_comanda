<?php

namespace Database\Seeders;

use App\Models\ComandaAdmin;
use App\Models\ComandaCategoria;
use App\Models\ComandaCliente;
use App\Models\ComandaCozinha;
use App\Models\ComandaGarcon;
use App\Models\ComandaUsuario;
use App\Models\Empresa;
use App\Models\Mesa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use stdClass;

class ComandaGarconSeeder extends Seeder
{

    public function run()
    {
        $empresa        = Empresa::first();
        $cliente        = new stdClass;
        $cliente->empresa_id  = $empresa->id;
        $cliente->nome  = "Garçon 01";
        $cliente->email = "garcon01@gmail.com";
        $senha = "1234";

        // Se não existir, cria o ComandaUsuario e o Cliente
        $comandaUsuario =  ComandaUsuario::create([
            'empresa_id'=> $empresa->id,
            'nome'      => $cliente->nome,
            'email'     => $cliente->email,
            'password'  => Hash::make($senha), // Certifique-se de hashear a senha
        ]);

        $cliente->usuario_id = $comandaUsuario->id;
        ComandaGarcon::Create(objToArray($cliente));
    }
}
