<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Método chamado ao acessar a rota login, neste método será retornado uma view
    //com um formulário para preenchimento dos dados de acesso ao app
    public function index(Request $request) {
        $erro = $request->get('erro');
        return view('site.login', ['title' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {

        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //validação dos dados enviados pelo formulário
        $request->validate($regras, $feedback);

        //as variáveis $email e $password recuperam os dados do objeto $request nos atributos
        //usuario e senha. Os nomes email e password são para ter compatibilidade com a tabela
        //users do banco de dados
        $email = $request->get('usuario');

        $password = $request->get('senha');

        //iniciar o Model User
        $user = new User();

        //query para verficiar se o usuário e senha existem no banco de dados
        $usuario = $user
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();
        

        //fazer uma validação da consulta no banco de dados
        //se a consulta não retornar um objeto vazio entraremos no if
        if(!empty($usuario->name)) {
            
            //dd($usuario);

            //Iniciar a sessão
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->name;

            //dd($_SESSION);

            //redirecionar para uma página que utilize o middleware de autenticação
            return redirect()->route('app.cliente');


        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
    }

    public function sair() {
        return 'Chegamos até o método sair de LoginController';
    }
}
