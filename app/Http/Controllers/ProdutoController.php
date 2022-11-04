<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$produtos = Produto::paginate(10);
        $produtos = Item::paginate(10);

        return view('app.produto.index', [
            'produtos' => $produtos,
            'request' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', [
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:100',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'descricao' => 'max:2000',
            'fornecedor_id' => 'exists:fornecedores, id'

        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min'=> 'O campo "nome" deve ter pelo menos 3 caracteres',
            'nome.max' => 'O campo "nome" deve ter no máximo 100 caracteres',
            'peso.integer' => 'Digite um número inteiro e selecione a unidade de medida desejada',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'unidade_id.exists' => 'O valor inserido não é válido',
            'fornecedor_id.exists' => 'O valor inserido não é válido'
        ];

        $request->validate($regras, $feedback);

        //dd($request->all());

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        //
        
        //dd($produto);
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //
        
        $regras = [
            'nome' => 'required|min:3|max:100',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'descricao' => 'max:2000',
            'fornecedor_id' => 'exists:fornecedores, id'

        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min'=> 'O campo "nome" deve ter pelo menos 3 caracteres',
            'nome.max' => 'O campo "nome" deve ter no máximo 100 caracteres',
            'peso.integer' => 'Digite um número inteiro e selecione a unidade de medida desejada',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'unidade_id.exists' => 'O valor inserido não é válido',
            'fornecedor_id.exists' => 'O valor inserido não é válido'
        ];
        $request->validate($regras, $feedback);
        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        //
        //dd($produto);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
