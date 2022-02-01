<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        // return Response('Chegamos no middleware e finalizamos no próprio middleware!');

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"$ip xyz requisitou a rota $rota"]);
        // return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status e o texto da resposa foram modificados.');

        return $resposta;

    }
}
