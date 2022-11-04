@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Listagem - Produtos</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('produto.create')}}">Novo</a></li>

                <li><a href="{{route('produto.index')}}">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right:auto;">

                <table border="1" width="100%">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td>{{$produto->produtoDetalhe->comprimento ?? '-'}}</td>
                                <td>{{$produto->produtoDetalhe->largura ?? '-'}}</td>
                                <td>{{$produto->produtoDetalhe->altura ?? '-'}}</td>
                                <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                                <td>
                                    <form id="excluir_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto' => $produto->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('excluir_{{$produto->id}}').submit()">Excluir</button>
                                    </form>
                                </td>
                                <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <h5>Pedidos</h5>
                                    @foreach ($produto->pedidos as $pedido)
                                        @if(isset($pedido->id))
                                            <p>ID: {{$pedido->id}}<a href="{{route('pedido_produto.create', ['pedido' => $pedido])}}"> Visualizar pedido </a></p>
                                            
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>

                </table>
                {{ $produtos->links() }}
        </div>

    </div>
@endsection