@extends('app.layouts.basico')

@section('titulo', 'Editar Detalhes do Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Produto Detalhes - Editar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="">Voltar</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <h4> Produto </h4>

            <div>
                Nome: {{$produto_detalhe->produto->nome}}
            </div>
            <br />
            <div>
                Descrição: {{$produto_detalhe->produto->descricao}}
            </div>
            <br />

            <div class="form-fornecedores">

                @component('app.produto_detalhe._components.form_create_edit',['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                    
                @endcomponent
                
                </form>

            </div>

        </div>

    </div>
@endsection