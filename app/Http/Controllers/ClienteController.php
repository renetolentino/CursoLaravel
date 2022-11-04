<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $clientes = Cliente::paginate(10);

        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = false;
        //regras de validação
        $regras = [
            'nome' => 'required|min:3|max:50'
        ];

        //feedback da validação
        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter no min. 3 caracteres.',
            'max' => 'O campo :attribute deve ter no máx. 50 caracteres'
        ];

        $request->validate($regras, $feedback);
        $cliente = Cliente::create($request->all());
        //dd($cliente);
        isset($cliente) ? $status = true : $status = false;

        return redirect()->route('cliente.create', ['status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        return view('app.cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        return view('app.cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //recuperar o cliente do banco de dados
        $status = $cliente->update($request->all());
        return redirect()->route('cliente.index', ['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
