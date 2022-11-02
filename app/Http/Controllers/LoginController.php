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
        session_destroy();
        return redirect()->route('site.index');
    }

    public function cadastrar(Request $request) {
        $status = $request->get('status');
        return view('site.cadastro', ['titulo' => 'Cadastro', 'status' => $status]);
    }

    public function salvarCadastro(Request $request) {
        //dd($request);
        $regras = [
            'email' => 'email',
            'name' => 'required|min:3|max:255',
            'password' => 'required|min:8|max:32'
        ];

        $feedback = [
            'email.email' => 'Verifique o email enviado',
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O nome deve conter pelo menos 3 letras',
            'name.max' => 'O nome é muito grande',
            'password' => 'A senha é inválida'
        ];

        $request->validate($regras, $feedback);

        //echo 'Chegamos até aqui';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user = User::where('email', $request->email)->get();

        //dd($user);

        $teste = $user->first();

        if($teste->email == $request->email) {
            return redirect()->route('site.cadastrar', ['status' => 1]);
        } else {
            return redirect()->route('site.cadastrar', ['status' => 0]);
        }

    }
}
