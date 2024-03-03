<?php

namespace App\Http\Controllers;

use App\Models\ComandaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function logar(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = ComandaUsuario::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return $this->redirectTo($user);
        }
        exit;
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    protected function redirectTo($user)
    {
        if ($user->admin()->exists()) {
            session(['admin_id' => $user->admin_id, "tipo" =>'admin']);
            return redirect()->route('admin.index');
        } elseif ($user->garcon()->exists()) {
            session(['garcon_id' => $user->garcon_id, "tipo" =>'garcon']);
            return redirect()->route('garcon.index');
        } elseif ($user->cozinha()->exists()) {
            session(['cozinha_id' => $user->cozinha_id, "tipo" =>'cozinha']);
            return redirect()->route('cozinha.index');
        } elseif ($user->cliente()->exists()) {
            session(['cliente_id' => $user->cliente_id, "tipo" =>'cliente']);
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
