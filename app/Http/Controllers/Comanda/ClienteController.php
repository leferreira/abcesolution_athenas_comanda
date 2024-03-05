<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\ComandaCliente;
use App\Models\ComandaUsuario;
use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index(){
       // $dados["mesas"] = Mesa::get();
       // return view("Comanda.Cardapio.home", $dados);
    }

    public function create(){

        return view("Comanda.Cliente.Create");
    }

    public function store(Request $request){
        $retorno = new \stdClass();
        try {
            $req  = $request->except(["_token","_method","eh_modal"]);

            // Se não existir, cria o ComandaUsuario e o Cliente
            $comandaUsuario =  ComandaUsuario::create([
                'empresa_id'=> $request->empresa_id,
                'nome'      => $request->nome,
                'email'     => $request->email,
                'password'  => Hash::make($request->senha), // Certifique-se de hashear a senha
            ]);

            $req["usuario_id"] = $comandaUsuario->id;
            ComandaCliente::Create($req);

            $credentials    = $request->only('email', 'password');
            $user           = ComandaUsuario::where('email', $request->email)->first();
            $user && Hash::check($request->password, $user->password);
            Auth::login($user);

            $retorno->tem_erro  = false;
            $retorno->erro      = "";
            return redirect()->route('cardapio.index');

        } catch (\Exception $e) {
            $retorno->tem_erro = true;
            $retorno->erro = $e->getMessage();
            return redirect()->back()->with('msg_erro', $e->getMessage());

        }
    }
}
