@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Adicionar - Detalhes</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="">Voltar</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                    
                @endcomponent

            </div>

        </div>

    </div>
@endsection