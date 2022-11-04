@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Listagem - Pedidos</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('pedido.create')}}">Novo</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right:auto;">

                <table border="1" width="100%">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pedido</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->cliente_id}}</td>
                                <td><a href="{{route('pedido_produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{route('pedido.show', ['pedido' => $pedido])}}">Visualizar</a></td>
                                <td>
                                    <form id="excluir_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('excluir_{{$pedido->id}}').submit()">Excluir</button>
                                    </form>
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $pedidos->links() }}
        </div>

    </div>
@endsection