<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos(); //eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto não existe',
            'quantidade.required' => 'O campo quantidade deve conter um valor inteiro'
        ];

        $request->validate($regras, $feedback);
        //--------------------------------------------------------------------------------------
        /*
        $produto_id = $request->get('produto_id');
        $pedido_id = $pedido->id;
        $pedido_produto = new PedidoProduto();
        $pedido_produto->pedido_id = $pedido_id;
        $pedido_produto->produto_id = $produto_id;
        $pedido_produto->save();
        */
        //-------------------------------------------------------------------------------------
        
        //$pedido->produtos; //registros do relacionamentos
        // @param id_produto
        // @param 
        $pedido
            ->produtos()
            ->attach(
                $request->get('produto_id'), 
                ['quantidade' => $request->get('quantidade')]); //objeto que mapeia esse relacionamento

        return redirect()->route('pedido_produto.create', ['pedido' => $pedido->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\Models\Pedido    $pedido
     * @param   \App\Models\Produto   $produto
     * @param   \App\Models\PedidoProduto   $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //método convencional
        /**PedidoProduto::where([
         * 'pedido_id' => $pedido->id,
         * 'produto_id'=>$produto->id])->delete();
         *  */
        //método detach (delete pelo relacionamento)
        //$pedido->produtos()->detach($produto->id);
        $pedidoProduto->delete();

        return redirect()->route('pedido_produto.create', ['pedido' => $pedido_id]);
    }
}
