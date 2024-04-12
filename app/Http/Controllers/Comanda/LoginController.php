<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;

use App\Models\ComandaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('Comanda.Login');
    }

    public function logar(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = ComandaUsuario::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return $this->redirectTo($user);
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    protected function redirectTo($user)
    {
        if ($user->admin()->exists()) {
            session(['admin' => $user->admin, "tipo" =>'admin']);
            return redirect()->route('admin.index');
        } elseif ($user->garcon()->exists()) {
            session(['garcon' => $user->garcon, "tipo" =>'garcon']);
            return redirect()->route('garcon.index');
        } elseif ($user->cozinha()->exists()) {
            session(['cozinha' => $user->cozinha, "tipo" =>'cozinha']);
            return redirect()->route('cozinha.index');
        } elseif ($user->cliente()->exists()) {
            session(['cliente' => $user->cliente, "tipo" =>'cliente']);
            return redirect()->route('cardapio.index');
        }

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        // Regenera o token da sessão para evitar ataques de sessão
        $request->session()->regenerateToken();

        // Redireciona para a página de login ou para a página inicial
        return redirect('/login');
    }


}
