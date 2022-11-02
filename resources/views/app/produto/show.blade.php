@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Produto - Visualizar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('produto.index')}}">Voltar</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                <table border="1" width="100%" style="text-align: left">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{$produto->id}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Nome:</td>
                            <td>{{$produto->nome}}</td>
                        </tr>

                        <tr>
                            <td>Descrição:</td>
                            <td>{{$produto->descricao}}</td>
                        </tr>

                        <tr>
                            <td>Peso:</td>
                            <td>{{$produto->peso}}</td>
                        </tr>

                        <tr>
                            <td>Unidade de medida:</td>
                            <td>{{$produto->unidade_id}}</td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection