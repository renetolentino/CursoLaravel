<?php

namespace App\Http\Middleware;

use App\Models\LogAcessoModel;
use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->server->get('REQUEST_URI');
        LogAcessoModel::create(['log' => "IP: $ip acessou a rota: $rota"]);
        return $next($request);
    }
}
