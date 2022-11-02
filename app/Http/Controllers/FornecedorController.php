<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(10);
        
        //dd($fornecedores);

        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores, 
            'request' => $request->all()
        ]);
    }

    public function adicionar(Request $request) {
        $regras = [
            'nome' => 'required',
            'UF' => 'required|min:2|max:2',
            'email' => 'email'
        ];
        $feedback = [
            'required' => 'Este campo é obrigatório',
            'email.email' => 'Verifique se este é um email valido'
        ];
        //Caso a página seja acessada pelo método POST ele automaticamente entrará no bloco de código
        //abaixo, caso contarário ele retornará apenas a view app.fornecedor.adicionar
        if($request->input('_token') != '' && $request->input('id') == '') {
            //aqui dentro fazer a validação do formulário
            $request->validate($regras, $feedback);
            //consultar banco de dados para verificar se já existe essa empresa registrada
            $fornecedor = Fornecedor::where('email', $request->email)
                ->orWhere('nome', $request->nome)
                ->get()
                ->first();

            //dd($fornecedor);

            //se retornar um objeto nulo entraremos no condicional abaixo
            if(empty($fornecedor)) {
                //como retornou um objeto nulo, então a empresa não está cadastrada
                //então podemos registra-la no banco de dados
                Fornecedor::create($request->all());
                //consultar novamente o banco de dados para verificar se o registro
                //foi concluido com sucesso
                $fornecedor = Fornecedor::where('email', $request->email)
                    ->get()
                    ->first();
                if($fornecedor->email == $request->email) {
                    //redirecionar para página adicionar com status 1
                    //indicando que a operação foi um sucesso
                    return redirect()->route('app.fornecedor.adicionar', ['status' => 1]);
                } else {
                    //se entrar neste bloco de código quer dizer que não foi possível
                    //registrar a empresa no banco de dados, então redirecionar
                    //o usuário para a página app.fornecedor.adicionar com o status 0
                    return redirect()->route('app.fornecedor.adicionar', ['status' => 0]);
                }

                
            } else if(!empty($fornecedor)) {
                //se a consulta for bem sucedida (isto é não retornar um objeto vazio)
                //então redirecionar o usuário para a página app.fornecedor.adicionar
                //com status 2 indicando que a empresa já existe no banco de dados
                return redirect()->route('app.fornecedor.adicionar', ['status' => 2]);
            }
        } else if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($request->all());
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id')]);
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar($id) {
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
        
    }
}
