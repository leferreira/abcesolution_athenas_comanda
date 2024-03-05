<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$userTypes)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('login')->with('erro', 'Você precisa estar logado.');
        }

        // Verifica se o usuário tem qualquer uma das relações especificadas
        $hasValidRelation = false;
        foreach ($userTypes as $userType) {
            if (method_exists($user, $userType) && $user->$userType()->exists()) {
                $hasValidRelation = true;
                break; // Sai do loop se encontrar uma relação válida
            }
        }

        if (!$hasValidRelation) {
            // Redireciona o usuário se ele não tiver nenhum dos tipos requeridos
            return redirect('login')->with('erro', 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
