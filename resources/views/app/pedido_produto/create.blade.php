@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Pedido - Adicionar Produto</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('pedido.index')}}">Voltar</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <h4>Detalhes do pedido</h4>
            <p>ID: {{$pedido->id}}</p>
            <p>Cliente: {{$pedido->cliente_id}}</p>

            <h4>Itens do pedido:</h4>

            <table border="1" style="margin-left: auto; margin-right:auto;">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Data de inclusão</th>
                    <th>Data de alteração</th>
                    <th></th>
                </tr>
                
                @foreach ($pedido->produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->pivot->quantidade}}</td>
                        <td>{{$produto->pivot->created_at->format('d/m/Y H:i')}}</td>
                        <td>{{$produto->pivot->updated_at->format('d/m/Y H:i')}}</td>
                        <td>
                            <form id="form_{{$produto->pivot->id}}" method="post" action="{{route('pedido_produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="form-fornecedores">

                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent

            </div>
        </div>

    </div>
@endsection