<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // return $next($request);

        // echo $metodo_autenticacao . ' - ' . $perfil . '<br>';
        // if($metodo_autenticacao == 'padrao'){ echo 'Verificar usuario e senha no banco de dados.'.$perfil.'<br>'; }
        // else if($metodo_autenticacao == 'ldap'){ echo 'Verificar usuario e senha no AD.'.$perfil.'<br>'; }

        // if(false) { return $next($request); }
        // else { return Response('Acesso negado! Rota exige autenticação...'); }

        session_start();

        if (isset($_SESSION['email']) &&  $_SESSION['email'] != '' ) {
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro'=>2]);
        }
    }
}
