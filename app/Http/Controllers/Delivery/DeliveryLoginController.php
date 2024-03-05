<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;

use App\Models\ComandaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryLoginController extends Controller
{
    public function index()
    {
        return view('Delivery.Login');
    }

    public function logar(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = ComandaUsuario::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            session()->forget("usuario_delivery_logado");
            session(["usuario_delivery_logado"=>$user->cliente]);
            return redirect()->route('delivery.home');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        // Regenera o token da sessão para evitar ataques de sessão
        $request->session()->regenerateToken();
        session()->forget("usuario_delivery_logado");
        // Redireciona para a página de login ou para a página inicial
        return redirect()->route('delivery.home');
    }


}
