@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Produto - Adicionar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('produto.index')}}">Voltar</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                @component('app.layouts._components.form_create_edit', ['unidades' => $unidades])
                    
                @endcomponent

            </div>

        </div>

    </div>
@endsection