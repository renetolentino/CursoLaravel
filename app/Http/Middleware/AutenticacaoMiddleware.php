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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //inicia a sessão para ter acesso a super global $_SESSION
        session_start();

        //verifica se o atributo email está definido e se seu valor não é vazio
        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {

            //passa a requisição para a rota app/clientes
            return $next($request);
            
        } else {

            //caso entre aqui nesse código o usuário será redirecionado para a página de login
            //com uma mensagem indicando a necessidade de autenticação.
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
